<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NeedsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NeedsTable Test Case
 */
class NeedsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NeedsTable
     */
    public $Needs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.needs',
        'app.users',
        'app.items',
        'app.categories',
        'app.camps',
        'app.posts',
        'app.offers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Needs') ? [] : ['className' => 'App\Model\Table\NeedsTable'];
        $this->Needs = TableRegistry::get('Needs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Needs);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
