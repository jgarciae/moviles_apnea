<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DatosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DatosTable Test Case
 */
class DatosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DatosTable
     */
    public $Datos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.datos',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Datos') ? [] : ['className' => DatosTable::class];
        $this->Datos = TableRegistry::getTableLocator()->get('Datos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Datos);

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
