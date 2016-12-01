<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CampsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CampsTable Test Case
 */
class CampsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CampsTable
     */
    public $Camps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.camps',
        'app.categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Camps') ? [] : ['className' => 'App\Model\Table\CampsTable'];
        $this->Camps = TableRegistry::get('Camps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Camps);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
