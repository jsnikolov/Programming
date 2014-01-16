function ThirdSolution()
    {
  		var n = 4;
  		var counter = 1;
  		var row;
  		var col;
  		for (var i = 0; i < 2 * n; i++)
  		{
  			var cols;
  			if (i < n)
  			{
  				cols = 0;
  			}
  			else
  			{
  				cols = i - n + 1;
  			}
  			for (var j = i - cols; j >= cols; j--)
  			{
  				//matrix[n - 1 - j, i - j] = counter;
  				row = n - 1 - j;
  				col = i - j;
  				console.log("[" + row + "," + col + "] = " + counter);
  				counter++;
  			}
  		}
    }
