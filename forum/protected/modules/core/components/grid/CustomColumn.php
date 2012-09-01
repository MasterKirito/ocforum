<?php

Yii::import('zii.widgets.grid.CGridColumn');

class CustomColumn extends CGridColumn
{
	
	public $label='Link';

	public $value;

	public $htmlOptions=array('class'=>'link-column');

	/**
	 * Renders the data cell content.
	 * This method renders a hyperlink in the data cell.
	 * @param integer $row the row number (zero-based)
	 * @param mixed $data the data associated with the row
	 */
	protected function renderDataCellContent($row,$data)
	{
		echo $this->label . "<br />" . $this->evaluateExpression($this->value, array('data'=>$data,'row'=>$row));;
		
	}
}
