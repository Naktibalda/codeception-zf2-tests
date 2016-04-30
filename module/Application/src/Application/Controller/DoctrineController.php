<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Doctrine\ORM\EntityManager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DoctrineController extends AbstractActionController
{
    /**
     * @var EntityManager
     */
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }


    public function indexAction()
    {

        $query = $this->em->createQuery('SELECT COUNT(u) FROM Application\Entity\User u');
        $count = $query->getSingleScalarResult();

        return new ViewModel([
            'count' => $count,
        ]);
    }

    public function createUserAction()
    {
        $name = $this->params()->fromPost('name');

        $user = new \Application\Entity\User();
        $user->name = $name;

        $this->em->persist($user);
        $this->em->flush();

        return new ViewModel();
    }
}
