<?php 
	//dpm($row);
	$rws =$row->field_field_newsletters;
	$mhtml="";
 ?>

<?php foreach ($rws as $mnewsletter): ?>
	<?php 
		$mpath= file_create_url($mnewsletter['raw']['uri']);
		$mhtml =$mhtml.'<li class="file" ><img class="file-icon pdfimage" alt="PDF icon" title="application/pdf"'. 
		'src="/sva/modules/file/icons/application-pdf.png"><div class="ultb3-info ib3-info-left"><div class="ultb3-title ult-responsive">'.$mnewsletter['raw']['description'].'</div><a class="pdf-button btn btn-primary" href="'.$mpath.'">Download</a></div></li>';
		 
	?>
<?php endforeach; ?>
<?php $output ='<div class="pdf-categary"><h1>'.$row->node_title.'</h1></div><ul>'.$mhtml.'</ul>'; print $output?>
<?php //dpm($output) ?>