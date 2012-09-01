
<?php

Yii::import('zii.widgets.grid.CGridColumn');

class DuscussionColumn extends CGridColumn
{
	/**
	 * @var string the label to the hyperlinks in the data cells. Note that the label will not
	 * be HTML-encoded when rendering. This property is ignored if {@link labelExpression} is set.
	 * @see labelExpression
	 */
	public $label='Link';
	/**
	 * @var string a PHP expression that will be evaluated for every data cell and whose result will be rendered
	 * as the label of the hyperlink of the data cells. In this expression, the variable
	 * <code>$row</code> the row number (zero-based); <code>$data</code> the data model for the row;
	 * and <code>$this</code> the column object.
	 */
	public $labelExpression;
	

	public $url='javascript:void(0)';
	/**
	 * @var string a PHP expression that will be evaluated for every data cell and whose result will be rendered
	 * as the URL of the hyperlink of the data cells. In this expression, the variable
	 * <code>$row</code> the row number (zero-based); <code>$data</code> the data model for the row;
	 * and <code>$this</code> the column object.
	 */
	public $urlExpression;
	/**
	 * @var array the HTML options for the data cell tags.
	 */
	public $htmlOptions=array('class'=>'link-column');
	/**
	 * @var array the HTML options for the hyperlinks
	 */
	public $linkHtmlOptions=array();

	/**
	 * Renders the data cell content.
	 * This method renders a hyperlink in the data cell.
	 * @param integer $row the row number (zero-based)
	 * @param mixed $data the data associated with the row
	 */
	protected function renderDataCellContent($row,$data)
	{
		$url=Yii::app()->request->baseUrl.'/discussion/' . $data->id;
		$label = $data->title;
		$options = $this->linkHtmlOptions;
	
		echo '<h4 class="discussion-title">'.CHtml::link($label,$url,$options).'</h4>';
		echo '<div>
			'.Yii::t('core', 'Autor').': '.$data->getUser()->username.',
			'.Yii::t('core', 'Category').': <a href="'.Yii::app()->request->baseUrl.'/discussions/category/'.$data->category->id.'" "="">'.$data->category->title.'</a>,
			'.Yii::t('core', 'Date').': '.date(Yii::app()->params['dateFormat'],strtotime($data->date)).'			
			</div>';
		
	}
}
