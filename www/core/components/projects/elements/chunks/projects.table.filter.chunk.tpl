<div align="right" style="float:right;padding-top:5px;" ><a href="[[++base_url]][[~110]]" style="font-size:17px;">Добавить новый проект</a></div>

<form method="GET">
<h3 >Поиск</h3>
<div class="project-filter-container">
<table width="100%">
	<tr>
		<td width="125">Отрасль проекта :</td>
		<td>
			<select name="category" style="width:100%;padding:5px;">
				<option value="0">[[%prjct.all_category? &namespace=`projects` &language=`ru`]]</option>
				[[+categories]]
			</select>
		</td>
		<td width="125" align="center">Содержит :</td>
		<td>
			<input type="text" name="search" style="padding:4px;" value="[[+search]]" />
		</td>
	</tr>
</table>
</div>
<p align="right" style="margin-top:10px;padding-right:20px">
	<input type="submit" value="Найти" class="btn-orange" style="padding:5px 25px;"/>
</p>
</form>
<div style="border:0px;border-color:#CCC;border-top:1px solid #DDD;height:1px;"></div>