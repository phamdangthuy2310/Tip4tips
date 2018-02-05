var FormLogActivities = {
  serializeDataUserHistory: function(data, form){
    data.affected_object = form.find('[name=affected_object]').val();
    data.action_history = form.find('[name=action_history]').val();
    data.name_object_history = form.find('[name=name_object_history]').val();
    data.description_history = form.find('[name=description_history]').val();
    data.name_update = form.find('[name=name_update]').val();
    data.id_update = form.find('[name=id_update]').val();
  }
}