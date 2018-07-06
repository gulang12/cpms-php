/**
* @param len  生成字符串长度 

**/
function createRandomStr(len){
	var len = len || 10;
    var str = '0123456789qazwsxedcrfvtgbyhnujmiklopQAZWSXEDCRFVTGBYHUJNIKMIOPLK'; 
    var random = "";
    for (var i =0; i < len; i++) {
    	
    	random+= str[Math.ceil(Math.random()*62)];
    }
    
    return random;
} 

function refreshRandomStr(el){
	var random = createRandomStr();

	$("#"+el).val(random);
}