
public function getwebhook(Request $request)
{
			$arr = $request['form_response']['definition']['fields'];
            $ans = $request['form_response']['answers'];
            $i= 0;
                foreach($arr as $key){
                    $resp ="";
                   switch($key['type']){
                    case 'multiple_choice':
                        switch($key['allow_multiple_selections']){
                            case 'true':
                                    foreach($ans[$i]['choices']['labels'] as $k => $value){
                                        $resp .=  $value .","; 
                                    }
                                    
                                    $arrs[$key['title']]  = $resp;
                                    
                                    break;
                             default:
                                $resp = $ans[$i]['choice']['label'];
                                $arrs[$key['title']]  = $resp;
                                    break;

                                }
                          break;
                    case 'yes_no':
                            $resp=  $ans[$i]['boolean'] ? "true" : "false";
                            $arrs[$key['title']]  = $resp;
                              break;

                    case 'date':
                            $resp=  $ans[$i]['date'];
                            $arrs[$key['title']]  = $resp;
                            break;

                    case 'email':
                            $resp=  $ans[$i]['email'];
                            $arrs[$key['title']]  = $resp;
                            break;  

                    case 'opinion_scale':
                            $resp=  $ans[$i]['number'];
                            $arrs[$key['title']]  = $resp;
                            break; 

                   case 'rating':
                            $resp=  $ans[$i]['number'];
                            $arrs[$key['title']]  = $resp;
                            break;

                   case 'long_text':
                            $resp=  $ans[$i]['text'];
                            $arrs[$key['title']]  = $resp;
                            break; 
                    case 'short_text':
                            $resp=  $ans[$i]['text'];
                            $arrs[$key['title']]  = $resp;
                            break; 
                    case 'dropdown':
                            $resp=  $ans[$i]['choice']['label'];
                            $arrs[$key['title']]  = $resp;
                            break; 
                    case 'number':
                            $resp=  $ans[$i]['number'];
                            $arrs[$key['title']]  = $resp;
                            break;

                    default:
                            
                            break;

                            }
                        $i=$i+1;
                }
				
			return json_encode($arrs);

}