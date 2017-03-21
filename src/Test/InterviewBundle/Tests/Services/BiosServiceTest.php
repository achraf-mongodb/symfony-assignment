<?php

namespace Test\InterviewBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Test\InterviewBundle\Services\BiosService;

class BiosServiceTest extends WebTestCase
{
    /** @var BiosService $biosService */
    private $biosService;

    public function setUp()
    {
        self::bootKernel();

        $this->biosService = self::$kernel->getContainer()->get('test.interview.bios_service');
    }

    public function testDeathBefore1900()
    {
        $biosList = $this->biosService->findByDeadBefore(1900);

        $this->assertEquals([], $biosList);
    }

    public function testDeathBefore1997()
    {
        $biosList = $this->biosService->findByDeadBefore(1997);
        $ids = array_keys($biosList);

        $this->assertEquals(['3'], $ids);
    }
}
