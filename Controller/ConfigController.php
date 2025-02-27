<?php

namespace EasyCustomerManager\Controller;


use EasyCustomerManager\Form\Configuration;
use EasyCustomerManager\EasyCustomerManager;
use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Model\ConfigQuery;
use TheliaSmarty\Template\Plugins\Form;
use Symfony\Component\Routing\Annotation\Route;

/**
 * class ConfigController
 * @Route("/admin/module/EasyCustomerManager", name="easy_customer_manager") 
 */
class ConfigController extends BaseAdminController
{
    /**
     * @Route("", name="set") 
     */
    public function setAction()
    {
        $form = new Configuration($this->getRequest());
        $response = null;

        $configForm = $this->validateForm($form);
        EasyCustomerManager::setConfigValue('order_types',$configForm->get('order')->getData(),true, true);

        $response = $this->render(
            'module-configure',
            ['module_code' => 'EasyCustomerManager']
        );
        return $response;
    }
}