

var numOfYA=0;
var aNumber = new Array();
var gaming=0;
var who=0;
    function  end(k)
	{
		var cc=document.getElementById("para");
		
		if(k==2)
		cc.innerHTML="黑方獲勝";
		else
		cc.innerHTML="白方獲勝";
		gaming=0;
	
	}
	function RD(x)	
	{
		var k =aNumber[x];
		if(k!=0)
		{
		if(x>44)
		if(x%10>=3 &&aNumber[x-44]==k)
			if(aNumber[x-33]==k)
				if(aNumber[x-22]==k)
					if(aNumber[x-11]==k)
						end(k);
		if(x>33 && x<89)
		if(x%10>=2 &&aNumber[x-33]==k)
			if(x%10<9 && aNumber[x-22]==k)
				if(aNumber[x-11]==k)
					if(aNumber[x+11]==k)
						end(k);
		if(x>22 && x<78)
		if(x%10>=1 &&aNumber[x-22]==k)
			if(x%10<8 && aNumber[x-11]==k)
				if(aNumber[x+22]==k)
					if(aNumber[x+11]==k)
						end(k);
		if(x>11 && x<67)
		if(aNumber[x-11]==k)
			if(x%10<7 && aNumber[x+11]==k)
				if(aNumber[x+22]==k)
					if(aNumber[x+33]==k)
						end(k);
		if(x<56)
		if(aNumber[x+11]==k)
			if(x%10<6 && aNumber[x+44]==k)
				if(aNumber[x+22]==k)
					if(aNumber[x+33]==k)
						end(k);
		}
	}
	function RU(x)	
	{
		var k =aNumber[x];
		if(k!=0)
		{
		if(x>39)
		if(x%10<6 &&aNumber[x-9]==k)
			if(aNumber[x-18]==k)
				if(aNumber[x-27]==k)
					if(aNumber[x-36]==k)
						end(k);
		if(x>30 && x<87)
		if(x%10<7 &&aNumber[x-27]==k)
			if(x%10>0 && aNumber[x-18]==k)
				if(aNumber[x-9]==k)
					if(aNumber[x+9]==k)
						end(k);
		if(x>22 && x<78)
		if(x%10<8 &&aNumber[x-18]==k)
			if(x%10>1 && aNumber[x-9]==k)
				if(aNumber[x+18]==k)
					if(aNumber[x+9]==k)
						end(k);
		if(x>12 && x<69)
		if( x%10>2 && aNumber[x-9]==k)
			if(x%10<9 && aNumber[x+9]==k)
				if(aNumber[x+18]==k)
					if(aNumber[x+27]==k)
						end(k);
		if(x<60)
		if(aNumber[x+9]==k)
			if(x%10>3 && aNumber[x+18]==k)
				if(aNumber[x+27]==k)
					if(aNumber[x+36]==k)
						end(k);
		}
	}
	function UD(x)	
	{
		var k =aNumber[x];
		if(k!=0)
		{
		if(x>40)
		if( aNumber[x-40]==k)
			if(aNumber[x-30]==k)
				if(aNumber[x-20]==k)
					if(aNumber[x-10]==k)
						end(k);
		if(x>30 && x<90)
		if(aNumber[x-30]==k)
			if(aNumber[x-20]==k)
				if(aNumber[x-10]==k)
					if(aNumber[x+10]==k)
						end(k);
		if(x>20 && x<80)
		if(aNumber[x-20]==k)
			if(aNumber[x-10]==k)
				if(aNumber[x+20]==k)
					if(aNumber[x+10]==k)
						end(k);
		if(x>10 && x<70)
		if(aNumber[x-10]==k)
			if(aNumber[x+10]==k)
				if(aNumber[x+20]==k)
					if(aNumber[x+30]==k)
						end(k);
		if(x<60)
		if(aNumber[x+10]==k)
			if(aNumber[x+40]==k)
				if(aNumber[x+20]==k)
					if(aNumber[x+30]==k)
						end(k);
		}
	}
function RL(x)	
	{
		var k =aNumber[x];
		if(k!=0)
		{
		var k =aNumber[x];
		if(x%10>3)
		if( aNumber[x-4]==k)
			if(aNumber[x-3]==k)
				if(aNumber[x-2]==k)
					if(aNumber[x-1]==k)
						end(k);
		if(x%10>2)
		if(x%10<9 && aNumber[x+1]==k)
			if(aNumber[x-3]==k)
				if(aNumber[x-2]==k)
					if(aNumber[x-1]==k)
						end(k);
		if(x%10>1)
		if(x%10<8 && aNumber[x+1]==k)
			if(aNumber[x+2]==k)
				if(aNumber[x-2]==k)
					if(aNumber[x-1]==k)
						end(k);
		if(x%10>0)
		if(x%10<7 && aNumber[x+1]==k)
			if(aNumber[x+3]==k)
				if(aNumber[x+2]==k)
					if(aNumber[x-1]==k)
						end(k);
		if(x%10<6 && aNumber[x+1]==k)
			if(aNumber[x+3]==k)
				if(aNumber[x+2]==k)
					if(aNumber[x+4]==k)
						end(k);
		}
	}
    function  ifend(x)
	{
		RD(x);
		UD(x);
		RU(x);
		RL(x);
		

	}





	function check(x)
	{
		if(gaming==1)
		{
    var o=document.getElementsByClassName("inn");
	if(aNumber[x]==0)
	{
	    if(who==0)
	    {
		o[x].style.backgroundImage="url('black.jpg')";
		who=1;
		aNumber[x]=2;
		}
		else
		{
		o[x].style.backgroundImage="url('white.jpg')";
		aNumber[x]=1;
		who=0;
		}
		ifend(x);
	}
	}
	 }
    function init()
	{
		gaming=1;
		var cc=document.getElementById("para");
		cc.innerHTML="===五子棋===";
    var cont=document.getElementById("container");
	var UpBound=100;
	var out="";
	for(k=0;k<100;k++)
	aNumber[k]=0;
	for(i=0;i<UpBound;i++)
	{
	out+="<button class=\"inn\" onclick=\"check("+i+")\"></button> ";
	}
	cont.innerHTML=out;
	}
	
	init();
	//lotto();
	
	
