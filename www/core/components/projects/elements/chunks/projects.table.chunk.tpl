<h3 style="font-size:18px;margin-top:15px;">[[%prjct.list_projects? &namespace=`projects` &language=`ru`]]</h3>
<table id="projects-table" class="projects-table" cellspacing=3 cellpadding=5 width="100%">
	<thead>
		<tr>
			<th>№</th>
			<th>[[%prjct.name]]</th>
			<th>[[%prjct.target]]</th>
			<th>[[%prjct.category]]</th>
			<th>[[%prjct.cost]]</th>
		</tr>
	</thead>
	<tbody>
		[[+tbody]]	
	</tbody>
</table>
<div>
    [[+pagination]]	
</div>
<script>
    [[+script]]
    $(document).ready(function(){
        $("#projects-table tbody tr[data-id]").on('click',function(event){
            var id = $(event.currentTarget).attr('data-id');
            document.location.href = "[[++site_url]]"+url_view+"&project="+id;
        });
        $("#projects-table thead th").on('click',function(event){
            var field = $(event.currentTarget).attr('data-field');
            url = document.location.href;
            if(url.indexOf("dir=")===-1){
                url=url+"&dir=asc";
            }
            if (url.indexOf("&field="+field)>0){
                if (url.indexOf("dir=asc")>0){
                    url=url.replace("dir=asc","dir=desc");
                }
                else{
                    url=url.replace("dir=desc","dir=asc");
                }
            }
            else{
                url=url.replace("&field="+url_field,"&field="+field);
            }
            document.location.href=url;
        });
    });
</script>