<?php  
namespace User\Model;
use Zend\Db\Sql\Select ;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Expression;
class TimezoneTable extends AbstractTableGateway
{
    protected $table = 'y2m_timezones';
    public function __construct(Adapter $adapter){
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new User());
        $this->initialize();
    }

	public function getTimezonesList(){
		$select = new Select;
		$select->from('y2m_timezones');
		$statement = $this->adapter->createStatement();
		$select->prepareStatement($this->adapter, $statement);		 
		$resultSet = new ResultSet();
		$resultSet->initialize($statement->execute());	
		return $resultSet->toArray();
	}


}
