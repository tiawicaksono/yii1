<?php

class DefaultController extends Controller
{

    public function filters()
    {
        return array(
            'Rights', // perform access control for CRUD operations
        );
    }

    public function init()
    {
        $this->defaultAction = 'statusRecommendation';
    }
}
