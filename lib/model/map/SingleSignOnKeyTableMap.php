<?php



/**
 * This class defines the structure of the 'single_sign_on_key' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.sfAltumoPlugin.lib.model.map
 */
class SingleSignOnKeyTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sfAltumoPlugin.lib.model.map.SingleSignOnKeyTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('single_sign_on_key');
		$this->setPhpName('SingleSignOnKey');
		$this->setClassname('SingleSignOnKey');
		$this->setPackage('plugins.sfAltumoPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('SECRET', 'Secret', 'VARCHAR', true, 32, null);
		$this->addColumn('USED', 'Used', 'BOOLEAN', true, null, false);
		$this->addForeignKey('SESSION_ID', 'SessionId', 'INTEGER', 'session', 'ID', false, null, null);
		$this->addColumn('VALID_FOR_MINUTES', 'ValidForMinutes', 'INTEGER', true, null, 1440);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Session', 'Session', RelationMap::MANY_TO_ONE, array('session_id' => 'id', ), 'CASCADE', null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
			'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // SingleSignOnKeyTableMap
