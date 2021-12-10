<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/buttons.css"> -->
    <title>Survey Form</title>
</head>

<body>
    <div class="grid-container full fluid">
        <div class="head"></div>
        
        <form action="process/insert.php">
            <h1>Survey Form</h1>
            <hr><br>
            <h5> Good day! <br>

We are fourth-year college students from the Pamantasan ng Lungsod ng Muntinlupa, Bachelor of Science in Computer Science program. 
As part of our requirements as graduating students, we are here to conduct an online survey for our thesis entitled, 
AN ANALYSIS OF MUNTINLUPEÑOS VOTING BEHAVIOR AND POLITICAL PARTICIPATION USING DIGITAL TRACE.</h5> <br>

<h5>This survey consists of questions about your experience as a registered Filipino voter and will only take about 10-15 minutes to complete. 

By participating in this survey, we are therefore granted permission to utilize the data we have acquired. However, r
assured that all of the information gathered here will only be used for thesis and research
 purposes only and that we solemnly abide by the Data Privacy Act of 2012.</h5>

            <div class="grid-x">
                <div class="cell medium-6 large-8">
                    <label>Name:</label>
                    <input type="text" name="rname" id="rname" placeholder="(Optional)">
                </div>
            </div>

            <br>
            
            <div class="grid-x">
                <div class="cell medium-6 large-4">
                    <fieldset class="fieldset">
                        <legend>Barangay</legend>
                        <input type="radio" name="barangay" id="barangay" value="Alabang"><label>Alabang</label><br>
                        <input type="radio" name="barangay" id="barangay" value="Ayala-Alabang"><label>Ayala-Alabang</label><br>
                        <input type="radio" name="barangay" id="barangay" value="Bayanan"><label>Bayanan</label><br>
                        <input type="radio" name="barangay" id="barangay" value="Buli"><label>Buli</label><br>
                        <input type="radio" name="barangay" id="barangay" value="Cupang"><label>Cupang</label><br>
                        <input type="radio" name="barangay" id="barangay" value="Poblacion"><label>Poblacion</label><br>
                        <input type="radio" name="barangay" id="barangay" value="Putatan"><label>Putatan</label><br>
                        <input type="radio" name="barangay" id="barangay" value="Sucat"><label>Sucat</label><br>
                        <input type="radio" name="barangay" id="barangay" value="Tunasan"><label>Tunasan</label><br>
                    </fieldset>
                </div>
            </div>

            <br>

            <div class="grid-x">
                <div class="cell">
                    <label>1. Do you always vote every election period? (Lagi ka bang bumoboto tuwing panahon ng halalan?)</label><br>
                    <input type="radio" name="question1" id="question1" value="Yes"><label>Yes</label><br>
                    <input type="radio" name="question1" id="question1" value="No"><label>No</label>
                </div>
            </div>

            <br>
            
            <div class="grid-x">
                <div class="cell">
                    <label>1.1 If not, what are the reasons or factors that affect your voting participation? (Kung hindi, ano ang mga dahilan o salik na nakakaapekto sa iyong paglahok sa pagboto?)</label><br>
                    <textarea name="question1.1" id="question1.1" rows="3"></textarea>
                </div>
            </div>

            <br>

            <div class="grid-x">
                <div class="cell">
                    <label>2. How long have you been a registered voter? (Gaano ka na katagal na rehistradong botante?)</label><br>
                    <textarea name="question2" id="question2" rows="3"></textarea>
                </div>
            </div>

            <br>

            <div class="grid-x">
                <div class="cell">
                    <label>3. Give a deep reason why you registered as a voter? (Magbigay ng isang malalim na rason bakit ba nagparehistro bilang isang botante?)</label><br>
                    <textarea name="question3" id="question3" rows="3"></textarea>
                </div>
            </div>

            <br>

            <div class="grid-x">
                <div class="cell">
                    <label>4. Why do you ensure to vote in every election period? (Bakit mo tinitiyak na bumoto sa bawat panahon ng halalan?)</label><br>
                    <textarea name="question4" id="question4" rows="3"></textarea>
                </div>
            </div>

            <br>

            <div class="grid-x">
                <div class="cell">
                    <label>5. What are the factors that influence you the most when voting? (Ano ang mga salik na higit na nakakaimpluwensya sa iyo kapag bumoboto?)</label><br>
                    <input type="radio" name="question5" id="question5" value="Personal Choice"><label>Personal Choice</label><br>
                    <input type="radio" name="question5" id="question5" value="Religion"><label>Religion</label><br>
                    <input type="radio" name="question5" id="question5" value="Family Preference"><label>Family Preference</label><br>
                    <input type="radio" name="question5" id="question5" value="Social Media"><label>Social Media</label><br>
                    <input type="radio" name="question5" id="question5" value="Vote-Buying"><label>Vote-Buying</label><br>
                    <label>Others:</label><input type="text" name="question5" id="question5">
                </div>
            </div>

            <br>

            <div class="grid-x">
                <div class="cell">
<!--
                <form>
  <input type="checkbox" id="fruit1" name="fruit-1" value="Apple">
  <label for="fruit1">Apple</label>
  <input type="checkbox" id="fruit2" name="fruit-2" value="Banana" disabled>
  <label for="fruit2">Banana</label>
  <input type="checkbox" id="fruit3" name="fruit-3" value="Cherry" checked disabled>
  <label for="fruit3">Cherry</label>
  <input type="checkbox" id="fruit4" name="fruit-4" value="Strawberry">
  <label for="fruit4">Strawberry</label>
</form> -->
                    
                    <label>6. What are the things that you consider when choosing a candidate? (Ano ang mga bagay na isinasaalang-alang mo sa pagpili ng kandidato?)</label><br>
                    <input type="checkbox" name="ques6ans1" id="ques6ans1"  value="History or Family Background">
                    <label for="ques6ans1">History or Family Background</label><br>
                    <input type="checkbox" name="ques6ans2" id="ques6ans2" value="Educational Background">
                    <label>Educational Background</label><br>
                    <input type="checkbox" name="ques6ans3" id="ques6ans3" value="Experiences">
                    <label>Experiences</label><br>
                    <input type="checkbox" name="ques6ans4" id="ques6ans4" value="Accomplishments">
                    <label>Accomplishments</label><br>
                    <input type="checkbox" name="ques6ans5" id="ques6ans5" value="Popularity">
                    <label>Popularity</label><br>
                    <input type="checkbox" name="ques6ans6" id="ques6ans6" value="Partylist">
                    <label>Partylist</label><br>
                    <label>Others:</label><input type="text" name="ques6ans7" id="ques6ans7">
                </div>
            </div>

            <br>

            <div class="grid-x">
                <div class="cell">
                    <label>7. How can you say that a particular politician deserves to be elected? What are your basis? (Paano mo masasabi na ang isang partikular na pulitiko ay karapat-dapat na mahalal? Ano ang iyong batayan?)</label><br>
                    <textarea name="question7" id="question7" rows="3"></textarea>
                </div>
            </div>

            <br>

            <div class="grid-x">
                <div class="cell">
                    <label>8. Do you fact-check the credentials of the candidates before you vote? (Sinusuri mo ba ang mga kredensyal ng mga kandidato bago ka bumoto?)</label><br>
                    <textarea name="question8" id="question8" rows="3"></textarea>
                </div>
            </div>

            <br>

            <div class="grid-x">
                <div class="cell">
                    <label>9. Do you keep track/do you stay updated about the candidates during the official campaign period? (Sinusubaybayan mo ba/nananatili ka bang updated tungkol sa mga kandidato sa panahon ng opisyal na kampanya?)</label><br>
                    <input type="radio" name="question9" id="question9" value="Yes"><label>Yes</label><br>
                    <input type="radio" name="question9" id="question9" value="No"><label>No</label>
                </div>
            </div>

            <br>

            <div class="grid-x">
                <div class="cell">
                    <label>9.1 What do you think is the importance of that? (Ano sa palagay ninyo ang kahalagahan nito)</label><br>
                    <textarea name="question9.1" id="question9.1" rows="3"></textarea>
                </div>
            </div>

            <br>

            <div class="grid-x">
                <div class="cell">
                    <label>10. Do you ask others about their preferences before voting? (Nagtatanong ka ba sa iba tungkol sa kanilang mga napupusuan bago bumoto)</label><br>
                    <input type="radio" name="question10" id="question10" value="Yes"><label>Yes</label><br>
                    <input type="radio" name="question10" id="question10" value="No"><label>No</label>
                </div>
            </div>

            <br>

            <div class="grid-x">
                <div class="cell">
                    <label>11. Are the perspectives/opinions of others important to your voting decision? (Mahalaga ba ang pananaw/opinyon ng iba sa iyong desisyon sa pagboto?)</label><br>
                    <input type="radio" name="question11" id="question11" value="Yes"><label>Yes</label><br>
                    <input type="radio" name="question11" id="question11" value="No"><label>No</label>
                </div>
            </div>

            <br>

            <div class="grid-x">
                <div class="cell">
                    <label>12. What platforms do most influence you in choosing your candidate? (Anong mga plataporma ang higit na nakakaimpluwensya sa iyo sa pagpili ng iyong kandidato?)</label><br>
                    <input type="checkbox" name="ques12ans1" id="ques12ans1" value="Social Media like Facebook, Instagram, Youtube, etc."><label>Social Media like Facebook, Instagram, Youtube, etc.</label><br>
                    <input type="checkbox" name="ques12ans2" id="ques12ans2" value="Television/Commercial Ads"><label>Television/Commercial Ads</label><br>
                    <input type="checkbox" name="ques12ans3" id="ques12ans3" value="Billboard/Posters"><label>Billboard/Posters</label><br>
                    <input type="checkbox" name="ques12ans4" id="ques12ans4" value="Radio Ads"><label>Radio Ads</label><br>
                    <label>Others:</label><input type="text" name="ques12ans5" id="ques12ans5">
                </div>
            </div>

            <div class="grid-x">
                <div class="cell">
                    <label>13. Do you consider the candidates that are recommended by your family and/or peers? (Itinuturing ba ninyo ang mga kandidatong inirerekomenda ng inyong pamilya at/o mga kabarkada?)</label><br>
                    <input type="radio" name="question13" id="question13" value="Yes"><label>Yes</label><br>
                    <input type="radio" name="question13" id="question13" value="No"><label>No</label>
                </div>
            </div>

            <br>

            <div class="grid-x">
                <div class="cell">
                    <label>14. Do family and friends have significant influence over your decision-making when it comes to voting? (Malaki ba ang impluwensya ng iyong pamilya at mga kaibigan sa inyong desisyon pagdating sa pagboto?</label><br>
                    <input type="radio" name="question14" id="question14" value="Yes"><label>Yes</label><br>
                    <input type="radio" name="question14" id="question14" value="No"><label>No</label>
                </div>
            </div>

            <hr>

            
             

            <input type="submit" class="button" value="Submit"><br><br><br>

            

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/js/foundation.min.js" crossorigin="anonymous"></script>
</body>
</html>