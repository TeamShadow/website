function updateShading()
{	
	var tables = document.querySelectorAll('table.shaded');		
	for(var i = 0; i < tables.length; i++ )
	{
		var rows = tables[i].getElementsByTagName('tr');		
		for( var j = 1; j < rows.length; j++ )
		{			
			if( j % 2 == 1 )
				rows[j].style.backgroundColor =  "rgb(155,220,251)";
		}
	}
	
	tables = document.querySelectorAll('table.columns');
	for(var i = 0; i < tables.length; i++ )
	{
		var rows = tables[i].getElementsByTagName('tr');		
		for( var j = 0; j < rows.length; j++ )
		{
			var cells = rows[j].getElementsByTagName('td');			
			for(var k = 0; k < cells.length; k++ )
			{			
				if( k % 2 == 0 )
					cells[k].style.backgroundColor =  "rgb(155,220,251)";
			}
		}
	}
}
