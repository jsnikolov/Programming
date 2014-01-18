function RoundMatrix()
    {
		var arr = [];
		var n = 7;
		var counter = 1;
		var row = 0;
		var col = 0;
		var outerLength = n*2-1;
		var innerLength;
		
		for(var i = 0; i < n; i++)
		{
			arr[i] = [];
		}
		
		
		for (var i = 0, l = n*2; i < outerLength; i++, l--)
		{
			innerLength = (l/2)|0;
			for (var j = 0; j < innerLength; j++)
			{
				if((n%2 === 0) && (i%2 === 0) && (innerLength%2 === 0)){
					row++;    
				} 
				else if((n%2 !== 0) && (i%2 === 0) && (innerLength%2 !== 0))
				{
					row++;
				}
				if((n%2 === 0) && (i%2 == 0) && (innerLength%2 != 0)){
					row--;    
				} 
				else if((n%2 !== 0) && (i%2 === 0) && (innerLength%2 === 0))
				{
					row--;
				}             
				if((n%2 === 0) && (i%2 != 0) && (innerLength%2 == 0)){
					col--;    
				} 
				else if((n%2 !== 0) && (i%2 !== 0) && (innerLength%2 !== 0))
				{
					col--;
				}              
				if((n%2 === 0) && (i%2 != 0) && (innerLength%2 != 0)){
					col++;
				} 
				else if((n%2 !== 0) && (i%2 !== 0) && (innerLength%2 === 0))
				{
					col++;
				}  
				//console.log(row-1 + "/" + col + " = " + i + "/" + innerLength);
				//console.log(j);
				arr[row-1][col] = counter;
				counter++;
			}
			//console.log("=====");
		}
		for(var i = 0; i < n; i++)
		{
			console.log(arr[i]);
		}
		
    }
