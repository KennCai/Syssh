<form>
	<table class="contentTable search-bar" cellpadding="0" cellspacing="0" align="center">
		<thead><tr><th width="80px">搜索</td></tr></thead>
		<tbody>
			<tr>
				<td><input type="text" name="name" value="<?=option('search/name')?>" placeholder="名称" title="名称" /></td>
			</tr>
			<tr>
				<td>
					<select name="labels[]" data-placeholder="标签" multiple="multiple"><?=options($this->document->getAllLabels(),option('search/labels'))?></select>
				</td>
			</tr>
			<tr>
				<td class="submit">
					<button type="submit" name="search" tabindex="0">搜索</button>
					<button type="submit" name="search_cancel" tabindex="1"<?if(is_null(option('search/name')) && !option('search/labels')){?> class="hidden"<?}?>>取消</button>
				</td>
			</tr>
		</tbody>
	</table>
</form>
<input id="fileupload" type="file" name="document" data-url="/document/submit" multiple="multiple" />
<?=javascript('jQuery/jquery.iframe-transport')?>
<?=javascript('jQuery/jquery.fileupload')?>
<script>
$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
		dropZone:aside,
        done: function (event, data) {
			$(data.result.data).appendTo(aside.children('section[for="document"]'))
			.trigger('blockload')
			.children('select').chosen({search_contains:true});
        }
    });
});
</script>