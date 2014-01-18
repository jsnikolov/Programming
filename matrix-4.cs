if(((rows&1) === 0) && ((i&1) === 0) && ((innerLength&1) === 0))
{
	newRow++;    
} 
else if(((rows&1) !== 0) && ((i&1) === 0) && ((innerLength&1) !== 0))
{
	newRow++;
}
if(((rows&1) === 0) && ((i&1) == 0) && ((innerLength&1) != 0))
{
	newRow--;    
} 
else if(((rows&1) !== 0) && ((i&1) === 0) && ((innerLength&1) === 0))
{
	newRow--;
}             
if(((rows&1) === 0) && ((i&1) != 0) && ((innerLength&1) == 0)){
	newCol--;    
} 
else if(((rows&1) !== 0) && ((i&1) !== 0) && ((innerLength&1) !== 0))
{
	newCol--;
}              
if(((rows&1) === 0) && ((i&1) != 0) && ((innerLength&1) != 0))
{
	newCol++;
} 
else if(((rows&1) !== 0) && ((i&1) !== 0) && ((innerLength&1) === 0))
{
	newCol++;
}
