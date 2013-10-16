<div style="margin-right:15px;">
	<table style="width:100%;margin:0 auto;">
		<tr>
			<td><input type="text" style="width:95%;padding:5px 7px;" placeholder="Введите ключевое слово"/></td>
			<td align="right" style="width:150px;"><input type="button" class="btn-orange"  value="Найти" style="margin-right:0px;"/></td>
		</tr>
		<tr style="height:10px;"></tr>
	</table>

	<table style="width:100%;margin:0 auto;">
		<tr>
			<td><a href="" id="btn-search-more" style="font-size:16px;font-style:normal;color:#777;text-decoration:underline;">Расширенный поиск</a></td>
			<td align="right"><a href="[[++site_url]][[~102]]" class="orange-link" style="font-size:16px;font-weight:600;text-decoration:underline;">Добавить объявление<a/></td>
		</tr>
		<tr style="height:10px;"></tr>
	</table>
	
<div id="search-more" style="display:none;">

<div style="border:0px;border-color:#CCC;border-top:1px solid #DDD;height:1px;"></div>

<h3 style="font-size:18px;margin:15px 0px;margin-bottom:17px;">Расширенный поиск</h3>
<div style="background:#EFEFEF;padding:10px 15px;">
<form id="market-filter" method="GET">
	<table class="market-form"  width="100%">
	<colgroup>
		<col width="10%"/>
		<col width="15%"/>
		<col width="10%"/>
		<col width="15%"/>
		<col width="5%"/>
		<col width="45%"/>
	</colgroup>
		<tr>
			<td colspan=6 align="left">Тип объявления: [[+type]]</td>
		</tr>
		<tr style="height:10px;"></tr>
		<tr>
			<td colspan=6><input type="text" style="width:720px" placeholder="Введите ключевое слово"/></td>
		</tr>
		<tr style="height:10px;"></tr>
		<tr>
			<td colspan=4>Рубрика :</td>
			<td>&nbsp;</td>
			<td>Район :</td>
		</tr>
		<tr>
			<td colspan=4>
				<select name="category" style="width:100%" ><option value=0>Все Рубрики</option>[[+category]]</select>
			</td>
			<td>&nbsp;</td>
			<td>
				<select name="region" style="width:100%" >						<option value=0>Все Районы</option>[[+region]]</select>
			</td>
		</tr>
		<tr style="height:10px;"></tr>
		<tr>
			<td>Цена от</td>
			<td><input name="min_price" value="[[+min_price]]" style="width:100%" /></td>
			<td align="center">до </td>
			<td><input name="max_price" value="[[+max_price]]" style="width:100%" /></td>
			<td>&nbsp;</td>
			<td align="left">
				<input type="submit" class="btn-orange" style="height:26px;border:none;" id="submit-form" value="Найти"/>
			</td>
		</tr>
	</table>
</form>
</div>
</div>

<div style="margin:10px 0;margin-top:20px;" id="radio-type" ><span style="margin-right:15px"><b>Тип объявления:</b></span> [[+type]]</div>
<div id="choice-category" style="background:#EFEFEF;padding:10px 15px;">
	<table width="100%">
		<tr>
<td valign="top">
	<b>Продукция растениеводства</b>
	<ul class="market-category-ul">
	<li>-<a href="" data-id=1>Продукция растениеводства</a></li>
	</ul>			
	<br><b>Транспорт</b>
	<ul class="market-category-ul">
	<li>-<a href="" data-id=4>Сельскохозяйственная техника</a></li>
	<li>-<a href="" data-id=5>Спецтехника</a></li>
	<li>-<a href="" data-id=6>Грузовые машины</a></li>
	<li>-<a href="" data-id=7>Легковые машины</a></li>
	</ul>			
	<br><b>Техника и технологии</b>
	<ul class="market-category-ul">
	<li>-<a href="" data-id=13>Сборочные комплексы</a></li>
	<li>-<a href="" data-id=14>Производственные линии</a></li>
	</ul>			
</td>
<td valign="top">
	<b>Продукция животноводства</b>
	<ul class="market-category-ul">
	<li>-<a href="" data-id=2>Продукция животноводства</a></li>
	</ul>			
	<br><b>Недвижимость</b>
	<ul class="market-category-ul">
	<li>-<a href="" data-id=9>Земельные участки</a></li>
	<li>-<a href="" data-id=10>Производственные помещения</a></li>
	<li>-<a href="" data-id=11>Коммерческая недвижимость</a></li>
	</ul>
</td>
</tr>	
	</table>
</div>
</div>

<script>
	$(document).ready(function(){
		$("#btn-search-more").on('click',function(){
			$("#search-more").toggle();
			return false;
		});
		$("#radio-type input[name=type]").on('change',function(event){
			console.log(event.currentTarget);
			var id = $(event.currentTarget).attr("value");
			$("#market-filter input[name=type]").filter("input[value="+id+"]").click();
			$("#market-filter").submit();			
		});
		$("#choice-category li a").on('click',function(event){
			var id = $(event.currentTarget).attr("data-id");
			$("#market-filter select[name=category]").val(id);
			$("#submit-form").click();	
			return false;
		})
	});
</script>

