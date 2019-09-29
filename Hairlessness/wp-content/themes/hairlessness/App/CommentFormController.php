<?php

class CommentFormController
{
    /**
     * $_POST
     *
     *@var array
     */
    protected $input;

    /**
     * The encountered validation errors
     *
     *@var array
     */
    protected $errors = [];

    /**
     * Create a new controller instance
     *
     *@param array $input
     */
    function __construct($input)
    {
        $this->input = $input;
        $this->handle();
    }

    /**
     *Bootstrap the validation & saving of sent data
     */

    protected function handle()
    {
        $values = $this->validate();

        if (!$this->errors) {
            // sauvegarde en DB en utilisant le post_type 'user_recipe'
            $this->save($values);
        }
    }

    /**
     * Validate the required data
     */

    protected function validate()
    {
        $values  = [];
        $values['pseudo'] = $this->check_valid('pseudo');
        $values['message'] = $this->check_valid('message');

        return $values;
    }

    /**
     * Check if atteribute exist and escape its value
     */

    protected function check_valid($attribute)
    {
        if ($this->input[$attribute] ?? null) {
            return htmlspecialchars($this->input[$attribute]);
        }

        $this->errors[$attribute] = 'Veuillez fournir une valeur pour ce champs';
        return null;
    }
    /**
     * Save the given values using the 'user_recipe' post_type
     *@param array $values
     */

    protected function save($values)
    {
        wp_insert_post([
            'post_author' => 1,
            'post_content' => $values['message'],
            'post_title' => $values['pseudo'],
            'post_status' =>'pending',
            'post_type' => 'comments'
        ]);
    }
}