
var realData=[]
$(document).ready(function() {
    $('#tree_2').on('changed.jstree', function (e, data) {
        selectedData=data.selected
        console.log(data.selected)
        realData=[]
        for(var i=0; i<selectedData.length; i++){
            splitArray=selectedData[i].split("_")
            realData[i]=splitArray[1];
        }
        console.log(realData)
        var objNode = data.instance.get_node(data.selected);
        var note;
        note = 'Selected Node Data(Id: <strong>' + objNode.id + '</strong>, Name: <strong>' + objNode.text + '</strong>)'; e = 'Selected Category(Id: <strong>' + objNode.id + '</strong>, Name: <strong id="api-data" data-parent="' + objNode.parent + '" data-id="' + objNode.id + '">' + objNode.text + '</strong>)';
    
       console.log(note)
    });
})
function changeDate(){
    console.log($("#pbypDate").val())
    $.post("/changePbyp",
    {
      pbypDate: $("#pbypDate").val(),
      _token: $('#_token').val(),
    },
    function(data, status){
        var res=$.parseJSON(data)
        console.log(res)
        $("#competition").html(res.resultData[0].competition)
        $("#subtitle").html(res.resultData[0].play_date)
        $('#score_in').html(res.resultData[0].score_in)
        $('#score_out').html(res.resultData[0].score_out)
        if(res.resultData[0].score_in>res.resultData[0].score_out){
            $('#in_class').addClass('alc-event-team--winner')
            $('#out_class').removeClass('alc-event-team--winner')
        }
        if(res.resultData[0].score_in<res.resultData[0].score_out){
            $('#out_class').addClass('alc-event-team--winner')
            $('#in_class').removeClass('alc-event-team--winner')

        }
        var result_content=""
        result_content+="<tr><th>Alchemists</th>"
        result_content+="<td>"+res.resultData[0].first_score_in+"</td>"
        result_content+="<td>"+res.resultData[0].second_score_in+"</td>"
        result_content+="<td>"+res.resultData[0].third_score_in+"</td>"
        result_content+="<td>"+res.resultData[0].fourth_score_in+"</td>"
        result_content+="<td>"+res.resultData[0].score_in+"</td></tr><tr>"

        result_content+="<th>"+res.resultData[0].versus+"</th>"
        result_content+="<td>"+res.resultData[0].first_score_out+"</td>"
        result_content+="<td>"+res.resultData[0].second_score_out+"</td>"
        result_content+="<td>"+res.resultData[0].third_score_out+"</td>"
        result_content+="<td>"+res.resultData[0].fourth_score_out+"</td>"
        result_content+="<td>"+res.resultData[0].score_out+"</td></tr>"
        $('#result_table').html(result_content)
        var first_content=""
        for(i=0; i<res.firstData.length; i++){
            first_content+='<tr><td class="alc-align-start alc-highlight-sm alc-highlight">'+res.firstData[i].news_time+'</td><td class="alc-align-start alc-highlight"><img src="assets/images/samples/logos/alchemists_b_shield.png" alt="" class="alc-team-img">'+res.firstData[i].news_time+'</td></tr>'
        }
        $('#first_table').html(first_content)
        var second_content=""
        for(i=0; i<res.secondData.length; i++){
            second_content+='<tr><td class="alc-align-start alc-highlight-sm alc-highlight">'+res.secondData[i].news_time+'</td><td class="alc-align-start alc-highlight"><img src="assets/images/samples/logos/alchemists_b_shield.png" alt="" class="alc-team-img">'+res.secondData[i].news_time+'</td></tr>'
        }
        $('#second_table').html(second_content)
        var third_content=""
        for(i=0; i<res.thirdData.length; i++){
            third_content+='<tr><td class="alc-align-start alc-highlight-sm alc-highlight">'+res.thirdData[i].news_time+'</td><td class="alc-align-start alc-highlight"><img src="assets/images/samples/logos/alchemists_b_shield.png" alt="" class="alc-team-img">'+res.thirdData[i].news_time+'</td></tr>'
        }
        $('#third_table').html(third_content)
        var fourth_content=""
        for(i=0; i<res.fourthData.length; i++){
            fourth_content+='<tr><td class="alc-align-start alc-highlight-sm alc-highlight">'+res.fourthData[i].news_time+'</td><td class="alc-align-start alc-highlight"><img src="assets/images/samples/logos/alchemists_b_shield.png" alt="" class="alc-team-img">'+res.fourthData[i].news_time+'</td></tr>'
        }
        $('#fourth_table').html(fourth_content)
    });
}
function removeCompetition(no){
    console.log(no)
    $.post("/removeCompetition",
    {
      no: no,
      _token: $('#_token').val(),
    },
    function(data, status){
        var res=$.parseJSON(data)
        document.location.href="addCompetition"
        console.log(res)
    }
    );
}
function removeVenue(no){
    console.log(no)
    $.post("/removeVenue",
    {
      no: no,
      _token: $('#_token').val(),
    },
    function(data, status){
        var res=$.parseJSON(data)
        document.location.href="addVenue"
        console.log(res)
    }
    );
}
function removeTeam(no){
    console.log(no)
    $.post("/removeTeam",
    {
      no: no,
      _token: $('#_token').val(),
    },
    function(data, status){
        var res=$.parseJSON(data)
        document.location.href="addTeam"
        console.log(res)
    }
    );
}
function removeResult(no){
    console.log(no)
    $.post("/removeResult",
    {
      no: no,
      _token: $('#_token').val(),
    },
    function(data, status){
        var res=$.parseJSON(data)
        document.location.href="addResult"
        console.log(res)
    }
    );
}
function removeSchedule(no){
    console.log(no)
    $.post("/removeSchedule",
    {
      no: no,
      _token: $('#_token').val(),
    },
    function(data, status){
        var res=$.parseJSON(data)
        document.location.href="addSchedule"
        console.log(res)
    }
    );
}
function removeMember(no){
    console.log(no)
    $.post("/removeMember",
    {
      no: no,
      _token: $('#_token').val(),
    },
    function(data, status){
        var res=$.parseJSON(data)
        document.location.href="addTeamMembers"
        console.log(res)
    }
    );
}
function validSignup(){
    if ($('#firstname').val()=="" ) {
        alert('Please fill the first name')
        return false;
    }
    if ($('#lastname').val()=="" ) {
        alert('Please fill the last name')
        return false;
    }
    // if ($('#address').val()=="" ) {
    //     alert('Please fill the last address')
    //     return false;
    // }
    // if ($('#state').val()=="" ) {
    //     alert('Please fill the state')
    //     return false;
    // }
    // if ($('#zip').val()=="" ) {
    //     alert('Please fill the zip')
    //     return false;
    // }
    return true; 
}
function createWindow(){
    $.post("/createWindow",
    {
      _token: $('#_token').val(),
    },
    function(data, status){
    });    
}
function changePermission(id){
    console.log(id)
    console.log($('#'+id).val())
    $.post("/changePermission",
    {
        id:id,
        permission:$('#'+id).val(),
        _token: $('#_token').val(),
    },
    function(data, status){
        console.log(data)
    });  
}

function removeUser(id){
    $.post("/removeUser",
    {
        id:id,
        _token: $('#_token').val(),
    },
    function(data, status){
        document.location.href="userAccount"
    });  
}
function changeRole(){
    console.log(realData)
    $.post('changeRole',
    {
        roleData:realData,
        _token: $('#_token').val(),

    },
    function(data, status){
        console.log($.parseJSON(data))
    }
    )
}