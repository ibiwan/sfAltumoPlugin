<?php

/**
 * SystemEventSubscription filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSystemEventSubscriptionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'system_event_id' => new sfWidgetFormPropelChoice(array('model' => 'SystemEvent', 'add_empty' => true)),
      'remote_url'      => new sfWidgetFormFilterInput(),
      'enabled'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'system_event_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SystemEvent', 'column' => 'id')),
      'remote_url'      => new sfValidatorPass(array('required' => false)),
      'enabled'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('system_event_subscription_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SystemEventSubscription';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'system_event_id' => 'ForeignKey',
      'remote_url'      => 'Text',
      'enabled'         => 'Boolean',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
