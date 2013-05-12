<?php

namespace Club\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MemberController extends Controller
{
  /**
   * @Template()
   * @Route("")
   */
  public function indexAction()
  {
      $em = $this->getDoctrine()->getManager();

      $this->getUser()->setApiHash('meh'.rand('1234','12345'));
      $em->persist($this->getUser());
      $em->flush();

      return array();
  }
}
