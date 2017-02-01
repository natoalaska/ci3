<?php

$config = array(
    'auth/register' => array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|is_unique[users.username]'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
        ),
    )
);