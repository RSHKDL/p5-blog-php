<?php
namespace Framework\Validator;

class ValidationError
{


    /**
     * @var string
     */
    private $key;


    /**
     * @var string
     */
    private $rule;


    /**
     * @var array
     */
    private $attributes;


    private $messages = [
        'required' => 'Le champs %s est requis',
        'empty' => 'Le champs %s ne peut être vide',
        'slug' => '%s n\'est pas un slug valide',
        'minLength' => 'Le champs %s doit contenir plus de %d caractères',
        'maxLength' => 'Le champs %s doit contenir moins de %d caractères',
        'betweenLength' => 'Le champs %s doit contenir entre %d et %d caractères',
        'dateTime' => 'Le champs %s doit être une date valide (%s)',
        'exists' => 'Le champs %s n\'existe pas dans la table %s',
        'unique' => 'Le champs %s doit être unique',
        'email' => 'Ce courriel ne semble pas valide',
        'uploaded' => 'Une erreur est survenue lors de l\'ajout du fichier',
        'fileType' => 'Le champs %s n\'est pas au format valide (%s)'
    ];



    public function __construct(string $key, string $rule, array $attributes = [])
    {
        $this->key = $key;
        $this->rule = $rule;
        $this->attributes = $attributes;
    }


    public function __toString()
    {
        $params = array_merge([$this->messages[$this->rule], $this->key], $this->attributes);
        return (string)call_user_func_array('sprintf', $params);
    }
}
