<h3>[[+name.value]]</h3>
<table id="projectView" width="100%">
    <col width="250"/><col />
	<tr header=1>
		<th colspan=2>[[%prjct.general_info]]</th>
	</tr>
	<tr>
		<td>[[%prjct.fio]]</td>
		<td>[[+project.fio]]</td>
	</tr>
	<tr>
		<td>[[%prjct.face]]</td>
		<td>[[+project.face]]</td>
	</tr>
	<tr>
		<td>[[%prjct.post]]</td>
		<td>[[+project.post]]</td>
	</tr>

	<tr header=1>
		<th colspan=2>[[%prjct.сontact_information]]</th>
	</tr>
	<tr>
		<td>[[%prjct.address]]</td>
		<td>[[+project.address]]</td>
	</tr>
	<tr>
		<td>[[%prjct.mail]]</td>
		<td>[[+project.mail]]</td>
	</tr>
	<tr>
		<td>[[%prjct.phone]]</td>
		<td>[[+project.phone]]</td>
	</tr>

	<tr header=1>
		<th colspan=2>[[%prjct.description_project]]</th>
	</tr>
	<tr>
		<td>[[%prjct.name]]</td>
		<td>[[+project.name]]</td>
	</tr>
	<tr>
		<td>[[%prjct.target]]</td>
		<td>[[+project.target]]</td>
	</tr>
	<tr>
		<td>[[%prjct.description]]</td>
		<td>[[+project.description]]</td>
	</tr>
	<tr>
		<td>[[%prjct.place]]</td>
		<td>[[+project.place]]</td>
	</tr>
	<tr>
		<td>[[%prjct.grade]]</td>
		<td>[[+project.gradename]]</td>
	</tr>
	<tr>
		<td>[[%prjct.category]]</td>
		<td>[[+project.categoryname]]</td>
	</tr>

	<tr header=1>
		<th colspan=2>[[%prjct.information_funding]]</th>
	</tr>
	<tr>
		<td>[[%prjct.cost]]</td>
		<td>[[+project.cost]]</td>
	</tr>
	<tr>
		<td>[[%prjct.investment]]</td>
		<td>[[+project.investment]]</td>
	</tr>
	<tr>
		<td>[[%prjct.payback]]</td>
		<td>[[+project.payback]]</td>
	</tr>
	<tr>
		<td>[[%prjct.irr]]</td>
		<td>[[+project.irr]]</td>
	</tr>
	<tr>
		<td>[[%prjct.npv]]</td>
		<td>[[+project.npv]]</td>
	</tr>
	<tr>
		<td>[[%prjct.intended_purpose]]</td>
		<td>[[+project.intended_purpose]]</td>
	</tr>
	<tr>
		<td>[[%prjct.amount_jobs]]</td>
		<td>[[+project.jobs]]</td>
	</tr>
</table>

<script>
	//projectView
	$(document).ready(function() { 
		//$('tr:odd').filter(':not([header])').addClass('odd'); 
		$('#projectView tr:odd').filter(':not([header])').css("background-color","#dedede"); 
	});
</script>