<h3 style="font-size:18px;margin:15px 0px;margin-bottom:17px;">Результаты поиска</h3>
[[+thead]]
<table  id="market-table" class="market-table" style="width:756px" >
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
        $("#market-table tbody tr[data-id]").on('click',function(event){
            var id = $(event.currentTarget).attr('data-id');
            document.location.href = "[[++site_url]]"+url_view+"?view="+id;
        });
    });
</script>
