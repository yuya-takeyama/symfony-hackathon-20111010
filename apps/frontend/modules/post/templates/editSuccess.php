<?php echo $form->renderFormTag(url_for('post/edit?id=' . $form->getObject()->getId())) ?>
<table>
<?php echo $form ?>
</table>
<input type="submit" name="edit" value="edit" />
</form>
