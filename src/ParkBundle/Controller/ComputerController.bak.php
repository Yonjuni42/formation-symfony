<?php

namespace ParkBundle\Controller;

use ParkBundle\Entity\Person;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ParkBundle\Entity\Computer;
use ParkBundle\Form\ComputerType;

/**
 * Computer controller.
 */
class ComputerController extends Controller
{
    /**
     * List computers
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        //$computers = $this->getComputerList();
        $em = $this->getDoctrine()->getManager();

        $computers = $em->getRepository('ParkBundle:Computer')->findAll();

        return $this->render('ParkBundle:Computer:index.html.twig', array(
            'computers' => $computers,
        ));
    }

    /**
     * Create computers
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function testAction()
    {
        $em = $this->getDoctrine()->getManager();

        //computers
        $computerRepo = $em->getRepository('ParkBundle:Computer');
        $computers = $computerRepo->findAll();

        foreach ($computers as $computer) {
            $em->remove($computer);
        }

        foreach ($this->getComputerList() as $object) {
            $computer = new Computer();
            $computer->setName($object['name']);
            $computer->setIp($object['ip']);
            $computer->setEnabled($object['enabled']);

            $em->persist($computer);
        }
        $em->flush();

        //persons
        $personRepo = $em->getRepository('ParkBundle:Person');
        $persons = $personRepo->findAll();
        foreach ($persons as $person) {
            $em->remove($person);
        }

        $person = new Person();
        $person->setFirstName('toto');
        $person->setLastName('tutu');
        foreach ($computerRepo->findBy(array('enabled' => true)) as $computeraaa) {
            $person->addComputer($computeraaa);
        }

        $em->persist($person);

        $person = new Person();
        $person->setFirstName('tata');
        $person->setLastName('titi');
        $person->addComputer($computerRepo->findOneBy(array('name' => 'Ordinateur 4')));
        $person->addComputer($computerRepo->findOneBy(array('name' => 'Ordinateur 1')));

        $em->persist($person);

        $em->flush();

        return $this->redirectToRoute('computer');
    }

    /**
     * Debug, for demo purposes
     */
    public
    function debugAction()
    {

        echo '<pre>';
        var_dump($this->getComputerList());
        die();

    }

    /**
     * Computer list build
     * @return array
     */
    protected
    function getComputerList()
    {
        return array(
            0 => array(
                'id' => 1,
                'name' => 'Ordinateur 1',
                'ip' => '192.168.0.1',
                'enabled' => true
            ),
            1 => array(
                'id' => 2,
                'name' => 'Ordinateur 2',
                'ip' => '192.168.0.2',
                'enabled' => false
            ),
            2 => array(
                'id' => 3,
                'name' => 'Ordinateur 3',
                'ip' => '192.168.0.3',
                'enabled' => true
            ),
            3 => array(
                'id' => 4,
                'name' => 'Ordinateur 4',
                'ip' => '192.168.0.4',
                'enabled' => false
            ),
            4 => array(
                'id' => 5,
                'name' => 'Ordinateur 5',
                'ip' => '192.168.0.5',
                'enabled' => true
            ),
        );
    }
}
