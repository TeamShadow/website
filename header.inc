<div id="header">
		<a href="<?=$path?>">
			<img src="<?=$path?>images/shadow.png" alt="Shadow" style="float: left; padding: 1em"/>
		</a>	
		<div style="text-align: right; padding: 1.5em; height: 10em;">
			<strong>
			<?php
				$headings = explode( '<br/>', $subtitle );
				$count = count( $headings );
				if( $count > 1 )				
				{
					foreach( $headings as $heading )
					{
						if( $count > 1 )
						{
							echo '<a style="display: inline-block;" href="';
							for( $i = 1; $i < $count; $i++ )
								echo '../';
							echo '"/>' . $heading . '</a> > ';						
						}
						else
							echo '<span style="display: inline-block;">' . $heading . '</span>';
						$count--;
					}				
				}
				else	
					echo $subtitle;
			?>
			</strong>
		</div>		
</div>