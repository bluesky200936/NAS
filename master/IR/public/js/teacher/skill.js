$(document).ready(function(){
	var rowCounts = 0;
	$(function() {
		$("#btnAdd").click(function() {
			rowCounts++;

			//增加一個tr物件，並給予class:dynamic_tr，給它一個id判斷所在位置
			var tr = $("<tr></tr>").addClass("dynamic_tr").attr("id", "trNo" + rowCounts);
			//增加一個td物件，文字是它的編號
			var td = $("<td></td>").text(rowCounts).attr("id", "tdNo" + rowCounts);
			//將td插入tr中
			tr.append(td);

			var td_1 = $("<td></td>").text($('#buttondropdown1').val() + $('#buttondropdown1').attr("alt"));
			//增加input物件，給予class:ipt，給它一個rowCount判斷所在位置
			var input = $("<input type=\"hidden\" />").attr("name", "iptNo[" + rowCounts + "]").attr("value",$('#buttondropdown1').attr("alt"));
//			var input = $("<input type=\"text\" />").addClass("ipt").attr("rowCount", rowCounts).attr("name", "iptNo[" + rowCounts + "]").attr("value",$('#buttondropdown1').val());
	//                    var input = $("<input type=\"text\"/>").addClass("ipt").attr("rowCount", rowCounts).attr("id", "iptNo" + rowCounts);
			td_1.append(input);
			tr.append(td_1);

			//將tr插入table
			$("#myTable").append(tr);
		});
		
	});
	$('#optSkill li').click(function() {
		//alert($(this).text());
		console.log($(this).attr("id"));
//		console.log($(this).html());
		$('#buttondropdown1').val($(this).text()).attr("alt",$(this).attr("id"));
	});		
});