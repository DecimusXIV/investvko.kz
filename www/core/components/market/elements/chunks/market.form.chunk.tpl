<script>
	function getFile(){
		document.getElementById("photo").click();
	}
	function setFile(obj){
		var file = obj.value;
		var name = file.split("\\");
		$("#for_photo").attr('value',name[name.length-1]);
		event.preventDefault();
	}
</script>

[[!FormIt? hooks=`Insert.Market`
            &validate=`mail:email:required:required
                        ,amount:required:minValue=^1^
                        ,type:required
                        ,region:required
                        ,category:required:required
                        ,contact:required:required
                        ,units:required:required
                        ,content:required:required
                        ,price:required:minValue=^1^
                        ,type:required`
]]

<form action="" method="POST" enctype="multipart/form-data" >

   <!-- [[!+fi.validation_error_message]] -->
    [[!+fi.error_message]]

<div style="background:#EFEFEF;padding:10px 15px;margin-right:15px;">
	<table class="market-form" width="96%" cellspacing=0 cellpadding=0>

		<col width="15%"/>
		<col width="10%"/>
		<col width="25%"/>
		<col width="30"/>
		<col width="25%"/>
		<col width="20%"/>

		<tbody>
			<tr>
				<td colspan="6"><b>Тип объявления</b>&nbsp;&nbsp;&nbsp;[[+type]]</td>
			</tr>
            <tr>
              <td colspan="6"><span class="error">[[!+fi.error.type]]</span> </td>
            </tr>
			<tr style="height:10px;"></tr>	
			<tr>
				<td colspan="3">Рубрика<font style="color:red">*</font></td>
				<td>&nbsp;</td>
				<td colspan="3">Район<font style="color:red">*</font></td>
			</tr>
			<tr style="height:5px;"></tr>
			<tr>
				<td colspan="3">
					<select name="category" style="width:100%;">
					[[+category]]
					</select>
				</td>
				<td>&nbsp;</td>	
				<td colspan="3">
					<select name="region" style="width:100%;">
						[[+region]]
					</select>
				</td>
			</tr>
			<tr style="height:10px;"></tr>
			<tr>
				<td colspan="6">Контакты ( телефон и адрес )<font style="color:red">*</font>
    			 <span class="error">[[!+fi.error.contact]]</span> 
				</td>
                
			</tr>
			<tr style="height:5px;"></tr>
			<tr>
				<td colspan="6"><textarea name="contact" rows=2 style="width:700px">[[!+fi.contact]]</textarea>  
				</td>
			</tr>
			<tr style="height:10px;"></tr>
			<tr>
				<td colspan="6">E-mail для связи<font style="color:red">*</font>
    			<span class="error">[[!+fi.error.mail]]</span> 
				</td>
			</tr>
			<tr style="height:5px;"></tr>
			<tr>
				<td colspan="6"><input type="text" style="width:690px" name="mail" value="[[!+fi.mail]]" /></td>
			</tr>
			<tr style="height:10px;"></tr>
			<tr>
				<td colspan="6">Текст объявления<font style="color:red">*</font>
    			 <span class="error">[[!+fi.error.content]]</span>    
				</td>
			</tr>
			<tr style="height:5px;"></tr>
			<tr>
				<td colspan="6"><textarea rows=5 name="content" style="width:700px">[[!+fi.content]]</textarea>
    			   
				</td>
			</tr>
			<tr style="height:10px;"></tr>
			<tr>
				<td >Количество<font style="color:red">*</font>    			 
				</td>
				<td colspan="3"><input name="amount" value="[[!+fi.amount]]" style="width:98%;" />    			
				</td>
				<td>
                    &nbsp;Единица измерения<font style="color:red">*</font>   			  
				</td>
				<td><input type="text" name="units" value="[[!+fi.units]]" style="width:180px;" />   			     
				</td>
			</tr>
            <tr>
                <td></td>
                <td colspan="3"><span class="error">[[!+fi.error.amount:notempty=`Введите количество`]]</span></td>
                <td colspan="2">&nbsp;<span class="error">[[!+fi.error.units]]</span></td>
            </tr>
			<tr style="height:10px;"></tr>
			<tr>
				<td >Фотография</td>
				<td colspan="2">
                <div style="height:0px;width:0px; overflow:hidden;"><input type="file" name="photo" id="photo" value="[[!+fi.photo]]" onchange="setFile(this)"/></div>
                	<input type="text" value="" id="for_photo" readonly style="padding:1px 0px;width:100%;" onclick="getFile()"/>
                </td>
				<td>&nbsp;</td>
				<td colspan="2"><input type="button" id="photo-btn" class="btn-grey" onclick="getFile()" value="Выберите файл"/></td>
			</tr>
			<tr style="height:10px;"></tr>
			<tr>
				<td >Цена<font style="color:red">*</font>    			  
				</td>
				<td colspan="2"><input name="price" value="[[!+fi.price]]" style="width:100%"/>   			     
				</td>
				<td colspan="3"></td>
			</tr>
            <tr>
                <td></td>
                <td colspan="2"><span class="error">[[!+fi.error.price:notempty=`Введите цену`]]</span> </td>
                <td colspan="2"></td>
            </tr>
		</tbody>
	</table>
<br>
    </div>
	<p><input type="submit" class="btn-orange" value="Опубликовать"/></p>
</form>

