<?php

Yii::import('zii.widgets.grid.CGridColumn');

class PostColumn extends CGridColumn
{

	public $htmlOptions=array('class'=>'link-column');

	/**
	 * Renders the data cell content.
	 * This method renders a hyperlink in the data cell.
	 * @param integer $row the row number (zero-based)
	 * @param mixed $data the data associated with the row
	 */
	protected function renderDataCellContent($row,$data)
	{
		
		echo '<p>'.Yii::t('core', 'Autor').': '.$data->getUser()->username.', '.Yii::t('core', 'Date').': '.date(Yii::app()->params['dateFormat'],strtotime($data->date)).' </p>';
		echo $data->text;
	}
}
