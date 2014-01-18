if(((rows&1) === 0) && ((i&1) === 0) && ((innerLength&1) === 0))
{
	row++;    
} 
else if(((rows&1) !== 0) && ((i&1) === 0) && ((innerLength&1) !== 0))
{
	row++;
}
if(((rows&1) === 0) && ((i&1) == 0) && ((innerLength&1) != 0))
{
	row--;    
} 
else if(((rows&1) !== 0) && ((i&1) === 0) && ((innerLength&1) === 0))
{
	row--;
}             
if(((rows&1) === 0) && ((i&1) != 0) && ((innerLength&1) == 0)){
	col--;    
} 
else if(((rows&1) !== 0) && ((i&1) !== 0) && ((innerLength&1) !== 0))
{
	col--;
}              
if(((rows&1) === 0) && ((i&1) != 0) && ((innerLength&1) != 0))
{
	col++;
} 
else if(((rows&1) !== 0) && ((i&1) !== 0) && ((innerLength&1) === 0))
{
	col++;
}
