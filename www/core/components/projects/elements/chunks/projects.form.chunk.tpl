<style>
    .project-form-container {
        padding: 10px 15px;
		background: #eee;
	}
	.project-filter-container {
		padding: 10px 15px;
		background: #eee;
	}
	.second-h3{
		font-size: 18px;
		margin-top: 20px;
		margin-bottom: 20px;
	}
	.project-field-error{
		color: red;
	}
</style>

[[!FormIt? hooks=`verificationProjects,redirect` &language=`ru` &redirectTo=[[+action_id]]
            &validate=`fio:stripTags:required:required
                        ,face:stripTags:required:required
                        ,post:stripTags:required:required
                        ,address:stripTags:required:required
                        ,mail:email:required:required
                        ,phone:stripTags:required:required
                        ,name:stripTags:required:required
                        ,target:stripTags:required:required
                        ,description:stripTags:required:required
                        ,place:stripTags:required:required
                        ,grade:stripTags:required:required
                        ,category:stripTags:required:required
                        ,cost:stripTags:required:required
                        ,investment:stripTags:required:required
                        ,payback:stripTags:required:required
                        ,irr:stripTags:required:required
                        ,npv:stripTags:required:required
                        ,intended_purpose:stripTags:required:required
                        ,jobs:stripTags:required:required
                    `
]]

[[!+fi.error.message]]

<form action="" method="POST">	
	<h3 class="second-h3" style="margin-top:0px;">[[%prjct.general_info? &namespace=`projects` &language=`ru`]]</h3>
	<div class="project-filter-container">
		<table class="projects-form-table" width="100%" cellspancing=0 cellpadding=0>
			<col />		<col width="35px"/>
			<tr>
				<td width="50">[[%prjct.fio]]<font style="color:red">*</font></td>
				<td colspan=2><input name="fio" type="text" style="width:100%;" value="[[!+fi.fio]]" /></td>

				<td width="100" align="center">[[%prjct.face]]<font style="color:red">*</font></td>
				<td width="200">
					<select name="face"  style="width:100%;">
						<option value="юр" [[!+fi.face:is=`юр`:then=`selected`]]>Юридическое лицо</option>
						<option value="физ" [[!+fi.face:is=`физ`:then=`selected`]]>Физическое лицо</option>
					</select>
	            </td>
			</tr>

	        <tr> 
	            <td colspan=5>
	            	<div class="error">[[!+fi.error.fio]]</div>
	            	<div class="error">[[!+fi.error.face]]</div>
	            </td>   
	        </tr>

			<tr style="height:5px;"></tr>
			<tr>
				<td colspan=2>[[%prjct.post]]<font style="color:red">*</font></td>
				<td colspan=3><input name="post" type="text" style="width:100%;margin-left:-4px;" value="[[!+fi.post]]" /></td>
			</tr>
	        <tr>
	            <td colspan="5"><span class="error">[[!+fi.error.post]]</span></td>
	        </tr>
		</table>
	</div>	

	<h3 class="second-h3">[[%prjct.сontact_information]]</h3>
	<div class="project-filter-container">
		<table class="projects-form-table" width="100%" cellspancing=0 cellpadding=0>
			<tr>
				<td>[[%prjct.address]]<font style="color:red">*</font></td>
				<td colspan=3><textarea name="address" style="width:100%;margin-left:-6px;">[[!+fi.address]]</textarea></td>
			</tr>
	        <tr><td colspan="4"><div class="error">[[!+fi.error.address]]</div></td></tr>

			<tr style="height:5px;"></tr>
			<tr>
				<td width="55">[[%prjct.mail]]<font style="color:red">*</font></td>
				<td><input name="mail" type="text" style="width:100%;margin-left:-4px;" value="[[!+fi.mail]]" /></td>
				<td width="75" align="center">[[%prjct.phone]]<font style="color:red">*</font></td>
				<td><input name="phone" type="text" style="width:100%;margin-left:-4px;" value="[[!+fi.phone]]" /></td>
			</tr>
	        <tr>
	            <td colspan="2"><div class="error">[[!+fi.error.mail]]</div></td>
	            <td colspan="2"><div class="error">[[!+fi.error.phone]]</div></td>
	        </tr>
		</table>
	</div>

	<h3 class="second-h3">[[%prjct.description_project]]</h3>
	<div class="project-filter-container">
		<table class="projects-form-table" width="100%" cellspancing=0 cellpadding=0>
			<col width="170"/><col width="60" /><col />

			<tr><td colspan=3>[[%prjct.name]]<font style="color:red">*</font></td></tr>
			<tr><td colspan=3><textarea name="name" rows=3 style="width:100%;margin-left:-6px;">[[!+fi.name]]</textarea></td></tr>
			<tr><td colspan=3><div class="project-field-error">[[!+fi.error.name]]</div></td></tr>

			<tr><td colspan=3>[[%prjct.target]]<font style="color:red">*</font></td></tr>
			<tr><td colspan=3><textarea name="target" rows=3 style="width:100%;margin-left:-6px;">[[!+fi.target]]</textarea></td></tr>
			<tr><td colspan=3><div class="project-field-error">[[!+fi.error.target]]</div></td></tr>

			<tr><td colspan=3>[[%prjct.description]]<font style="color:red">*</font></td></tr>
			<tr><td colspan=3><input type="text" name="description" value="[[!+fi.description]]" style="width:100%;margin-left:-4px;" /></td></tr>
			<tr><td colspan=3><div class="project-field-error">[[!+fi.error.description]]</div></td></tr>

			<tr><td colspan=3>[[%prjct.place]]<font style="color:red">*</font></td></tr>
			<tr><td colspan=3><textarea name="place" rows=3 style="width:100%;margin-left:-6px;">[[!+fi.place]]</textarea></td></tr>
			<tr><td colspan=3><div class="project-field-error">[[!+fi.error.place]]</div></td></tr>
			
			
			
			<tr>
				<td colspan=2>[[%prjct.grade]]<font style="color:red">*</font></td>
				<td>
					<input type="radio" name="grade" value="1" [[!+fi.grade:is=`1`:then=`checked`]] />&nbsp;Идея<br/>
					<input type="radio" name="grade" value="2" [[!+fi.grade:is=`2`:then=`checked`]] />&nbsp;Технико-коммерческое обоснование<br/>
					<input type="radio" name="grade" value="3" [[!+fi.grade:is=`3`:then=`checked`]] />&nbsp;Технико-экономическое обоснование<br/>
					<input type="radio" name="grade" value="4" [[!+fi.grade:is=`4`:then=`checked`]] />&nbsp;Бизнес план<br/>
					<input type="radio" name="grade" value="5" [[!+fi.grade:is=`5`:then=`checked`]] />&nbsp;Иное
				</td>
			</tr>
			<tr><td colspan=3><div class="project-field-error">[[!+fi.error.grade]]</div></td></tr>
			

			<tr>
				<td>[[%prjct.category]]<font style="color:red">*</font></td>
				<td colspan=2>
					<select name="category">
						[[+categories]]
					</select>
				</td>
			</tr>
			<tr><td colspan=3><div class="project-field-error">[[!+fi.error.category]]</div></td></tr>
		</table>
	</div>


	<h3 class="second-h3">[[%prjct.information_funding]]</h3>
	<div class="project-filter-container">
		<table class="projects-form-table" width="100%" cellspancing=0 cellpadding=0>
			<col />		<col width="410px"/>
			<tr>
				<td colspan=2>[[%prjct.cost]]<font style="color:red">*</font></td>
			</tr>
			<tr>
				<td colspan=2><input type="text" name="cost" value="[[!+fi.cost]]" style="width:100%;margin-left:-4px;"/></td>
			</tr>
			<tr>
				<td colspan=2>
					<div class="project-field-error">[[!+fi.error.cost]]</div>
				</td>
			</tr>

			<tr>
				<td colspan=2>[[%prjct.investment]]<font style="color:red">*</font></td>
			</tr>
			<tr>
				<td colspan=2><input type="text" name="investment" value="[[!+fi.investment]]" style="width:100%;margin-left:-4px;"/></td>
			</tr>
			<tr>
				<td colspan=2>
					<div class="project-field-error">[[!+fi.error.investment]]</div>
				</td>
			</tr>

			<tr>
				<td>[[%prjct.payback]]<font style="color:red">*</font></td>
				<td><input type="text" name="payback" value="[[!+fi.payback]]" style="width:100%;margin-left:-4px;"/></td>
			</tr>
			<tr>
				<td colspan=2>
					<div class="project-field-error">[[!+fi.error.payback]]</div>
				</td>
			</tr>

			<tr>
				<td align="center">[[%prjct.irr]]<font style="color:red">*</font></td>
				<td><input type="text" name="irr" value="[[!+fi.irr]]" style="width:100%;margin-left:-4px;"/></td>
			</tr>
			<tr>
				<td colspan=2>
					<div class="project-field-error">[[!+fi.error.irr]]</div>
				</td>
			</tr>
			
			<tr>
				<td align="center">[[%prjct.npv]]<font style="color:red">*</font></td>
				<td><input type="text" name="npv" value="[[!+fi.npv]]" style="width:100%;margin-left:-4px;"/></td>
			</tr>
			<tr>
				<td colspan=2>
					<div class="project-field-error">[[!+fi.error.npv]]</div>
				</td>
			</tr>
			
			<tr>
				<td colspan=2>[[%prjct.intended_purpose]]<font style="color:red">*</font></td>
			</tr>
			<tr>	
				<td colspan=2><input type="text" name="intended_purpose" value="[[!+fi.intended_purpose]]" style="width:100%;margin-left:-4px;"/></td>
			</tr>
			<tr>
				<td colspan=2>
					<div class="project-field-error">[[!+fi.error.intended_purpose]]</div>
				</td>
			</tr>

			<tr>
				<td>[[%prjct.amount_jobs]]<font style="color:red">*</font></td>
				<td><input type="text" name="jobs" value="[[!+fi.jobs]]" style="width:100%;margin-left:-4px;"/></td>
			</tr>
			<tr>
				<td colspan=2>
					<div class="project-field-error">[[!+fi.error.jobs]]</div>
				</td>
			</tr>
		</table>
	</div>

	<p >
		<input type="submit" class="btn-orange" style="padding: 5px 25px;" value="[[%prjct.add_projects]]">
	</p>
</form>

