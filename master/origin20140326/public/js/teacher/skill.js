$(document).ready(function(){
	var rowCounts = 0;
	$(function() {
		$("#btnAdd").click(function() {
			rowCounts++;

			//�W�[�@��tr����A�õ���class:dynamic_tr�A�����@��id�P�_�Ҧb��m
			var tr = $("<tr></tr>").addClass("dynamic_tr").attr("id", "trNo" + rowCounts);
			//�W�[�@��td����A��r�O�����s��
			var td = $("<td></td>").text(rowCounts).attr("id", "tdNo" + rowCounts);
			//�Ntd���Jtr��
			tr.append(td);

			var td_1 = $("<td></td>").text($('#buttondropdown1').val() + $('#buttondropdown1').attr("alt"));
			//�W�[input����A����class:ipt�A�����@��rowCount�P�_�Ҧb��m
			var input = $("<input type=\"hidden\" />").attr("name", "iptNo[" + rowCounts + "]").attr("value",$('#buttondropdown1').attr("alt"));
//			var input = $("<input type=\"text\" />").addClass("ipt").attr("rowCount", rowCounts).attr("name", "iptNo[" + rowCounts + "]").attr("value",$('#buttondropdown1').val());
	//                    var input = $("<input type=\"text\"/>").addClass("ipt").attr("rowCount", rowCounts).attr("id", "iptNo" + rowCounts);
			td_1.append(input);
			tr.append(td_1);

			//�Ntr���Jtable
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