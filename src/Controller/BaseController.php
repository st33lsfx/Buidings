<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    public const FL_SUCCESS = 'success';
    public const FL_INFO = 'info';
    public const FL_ERROR = 'danger';
    public const FL_WARNING = 'warning';
}