<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Utility\Hash;

class UsersTable extends Table
{

    public function initialize(array $config)
    {
        $this->table('users');
        $this->hasMany('ADmad/HybridAuth.SocialProfiles');
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            // You can configure as many upload fields as possible,
            // where the pattern is `field` => `config`
            //
            // Keep in mind that while this plugin does not have any limits in terms of
            // number of files uploaded per request, you should keep this down in order
            // to decrease the ability of your users to block other requests.
            'picture' => []
        ]);

        \Cake\Event\EventManager::instance()->on('HybridAuth.newUser', [$this, 'createUser']);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence('last_name')
            ->notEmpty('last_name', 'Ce champ doit être rempli.')
            ->requirePresence('email')
            ->add('email', [
                'length' => [
                    'rule' => 'email',
                    'message' => 'Ex : abc@xyz.cfr',
                ]
            ])
            ->requirePresence('phone')
            ->notEmpty('phone', 'Ce champ doit être rempli.')
            ->requirePresence('town')
            ->notEmpty('town', 'Ce champ doit être rempli.')
            ->requirePresence('password')
            ->notEmpty('password', 'Ce champ doit être rempli.')
            ->requirePresence('password_verify')
            ->notEmpty('password_verify', 'Ce champ doit être rempli.')
            ->add('picture', 'fileFileUpload', [
            'rule' => 'isFileUpload',
            'message' => 'Fichier introuvable pour téléchargement',
            'provider' => 'table',
            ])
            ->add('picture', 'fileSuccessfulWrite', [
                'rule' => 'isSuccessfulWrite',
                'message' => 'Echec du téléchargement du fichier',
                'provider' => 'table',
            ])
            ->add('picture', 'fileBelowMaxSize', [
                'rule' => ['isBelowMaxSize', 2048000],
                'message' => 'Fichier joint est trop lourd (doit être inférieur à 10 Mo)',
                'provider' => 'table',
            ])
            ->add('picture', 'fileAboveMinWidth', [
                'rule' => ['isAboveMinWidth', 250],
                'message' => 'Largeur de l\'image trop petite (doit être supérieur à 500px)' ,
                'provider' => 'table',
            ])
            ->add('picture', 'fileAboveMinHeight', [
                'rule' => ['isAboveMinHeight', 250],
                'message' => 'Hauteur de l\'image trop petite (doit être supérieur à 500px)',
                'provider' => 'table',
            ])
            ->add('picture', 'fileAviableExtension', [
                'rule' => ['isAviableExtension', ['jpg', 'png', 'jpeg']],
                'message' => 'Extension du fichier invalide (Extension valide : jpg, jpeg, png)',
                'provider' => 'table',
            ]);

        return $validator;
    }

    public function createUser(\Cake\Event\Event $event) {
        // Entity representing record in social_profiles table
        $profile = $event->data()['profile'];

        // Make sure here that all the required fields are actually present

        $user = $this->newEntity(['email' => $profile->email]);
        $user = $this->save($user);

        if (!$user) {
            throw new \RuntimeException('Unable to save new user');
        }

        return $user;
    }
	
	public function createFromSocialProfile($incomingProfile){
	
		 $clesTable = TableRegistry::get('Cleutilisations');
		// check to ensure that we are not using an email that already exists
		$user = $this->newEntity();
		$existingUser = $this->find()
                            ->where(
                                [
                                    'email' => $incomingProfile['email'],
                                ]
                            )
                            ->limit(1)
                            ->all();
							
		if(!empty($existingUser->first())){
			// this email address is already associated to a member
			return $existingUser->first();
		}else{
			// brand new user
			$user->role = 'bishop'; // by default all social logins will have a role of bishop
			$user->password = date('Y-m-d h:i:s'); // although it technically means nothing, we still need a password for social. setting it to something random like the current time..
			$user->confirmed_at = date('Y-m-d h:i:s');
			$user->confirmed_token = date('Y-m-d h:i:s');
			$user->first_name = $incomingProfile['first_name'];
			$user->last_name = $incomingProfile['last_name'];
			$user->town = ' ';
			$user->adress = ' ';
			$user->phone = ' ';
			$user->picture = $incomingProfile['picture'];
			$user->email = $incomingProfile['email'];

			// save and store our ID
			$this->save($user);
			return $user;
		}
	}
	
	 function str_random($length){
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }

    public function isAboveMinWidth($check, $width)
    {
        // Non-file uploads also mean the height is too big
        if (!isset($check['tmp_name']) || !strlen($check['tmp_name'])) {
            return false;
        }
        list($imgWidth) = getimagesize($check['tmp_name']);

        return $width > 0 && $imgWidth >= $width;
    }

    /**
     * Check that the file is below the maximum width requirement
     *
     * @param mixed $check Value to check
     * @param int $width Width of Image
     * @return bool Success
     */
    public function isBelowMaxWidth($check, $width)
    {
        // Non-file uploads also mean the height is too big
        if (!isset($check['tmp_name']) || !strlen($check['tmp_name'])) {
            return false;
        }
        list($imgWidth) = getimagesize($check['tmp_name']);

        return $width > 0 && $imgWidth <= $width;
    }

    /**
     * Check that the file is above the minimum height requirement
     *
     * @param mixed $check Value to check
     * @param int $height Height of Image
     * @return bool Success
     */
    public function isAboveMinHeight($check, $height)
    {
        // Non-file uploads also mean the height is too big
        if (!isset($check['tmp_name']) || !strlen($check['tmp_name'])) {
            return false;
        }
        list($imgHeight) = getimagesize($check['tmp_name']);

        return $height > 0 && $imgHeight >= $height;
    }

    /**
     * Check that the file is below the maximum height requirement
     *
     * @param mixed $check Value to check
     * @param int $height Height of Image
     * @return bool Success
     */
    public function isBelowMaxHeight($check, $height)
    {
        // Non-file uploads also mean the height is too big
        if (!isset($check['tmp_name']) || !strlen($check['tmp_name'])) {
            return false;
        }
        list(, $imgHeight) = getimagesize($check['tmp_name']);

        return $height > 0 && $imgHeight <= $height;
    }

    public function isAviableExtension($check, $extensions, $allowEmpty = true)
    {
        if($allowEmpty && empty($check['tmp_name'])){
            return true;
        }
        $extension = strtolower(pathinfo($check['name'] , PATHINFO_EXTENSION));
        return in_array($extension, $extensions);
    }

    /**
     * Check that the file is above the minimum file upload size
     *
     * @param mixed $check Value to check
     * @param int $size Minimum file size
     * @return bool Success
     */
    public function isAboveMinSize($check, $size)
    {
        // Non-file uploads also mean the size is too small
        if (!isset($check['size']) || !strlen($check['size'])) {
            return false;
        }

        return $check['size'] >= $size;
    }

    /**
     * Check that the file is below the maximum file upload size
     *
     * @param mixed $check Value to check
     * @param int $size Maximum file size
     * @return bool Success
     */
    public function isBelowMaxSize($check, $size)
    {
        // Non-file uploads also mean the size is too small
        if (!isset($check['size']) || !strlen($check['size'])) {
            return false;
        }

        return $check['size'] <= $size;
    }

    /**
     * Check that the file does not exceed the max
     * file size specified by PHP
     *
     * @param mixed $check Value to check
     * @return bool Success
     */
    public function isUnderPhpSizeLimit($check)
    {
        return Hash::get($check, 'error') !== UPLOAD_ERR_INI_SIZE;
    }

    /**
     * Check that the file does not exceed the max
     * file size specified in the HTML Form
     *
     * @param mixed $check Value to check
     * @return bool Success
     */
    public function isUnderFormSizeLimit($check)
    {
        return Hash::get($check, 'error') !== UPLOAD_ERR_FORM_SIZE;
    }

    /**
     * Check that the file was completely uploaded
     *
     * @param mixed $check Value to check
     * @return bool Success
     */
    public function isCompletedUpload($check)
    {
        return Hash::get($check, 'error') !== UPLOAD_ERR_PARTIAL;
    }

    /**
     * Check that a file was uploaded
     *
     * @param mixed $check Value to check
     * @return bool Success
     */
    public function isFileUpload($check)
    {
        return Hash::get($check, 'error') !== UPLOAD_ERR_NO_FILE;
    }

    /**
     * Check that the file was successfully written to the server
     *
     * @param mixed $check Value to check
     * @return bool Success
     */
    public function isSuccessfulWrite($check)
    {
        return Hash::get($check, 'error') !== UPLOAD_ERR_CANT_WRITE;
    }

}