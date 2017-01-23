<?php
    class ProductController extends Controller {
        protected $_authentication = array('index','post'); //login필요한 action정의
        const POST = 'status/post';
        const MICROPHONE = 'product/microphone';    // 마이크 상품
        const ADD = 'product/addProduct';    // 관리자 상품 등록



        /**
         ******************상품 진열********************
         */
        public function indexAction(){
            $all = $this->_connect_model->get('Product')->getAllList();
            $num = count($all);
            // echo $num;

            $index_view = $this->render(array(
                'all'=>$all,
                'num'=>$num
            ));

            return $index_view;
        }

        /**
         ******************고객용********************
         */
        public function showAction($par){
            $num = $par['id'];
            // echo $num;

            $detailProduct = $this->_connect_model->get('Product')->getDetailProduct($num);
            // var_dump($detailProduct);
            $show_view=$this->render(array(
                'dat'=>$detailProduct
            ));

            return $show_view;
        }

        /**
         ******************이미지 다운로드********************
         */
        public function downloadAction($par){
            //$real_name = $par['real_name'];
            $show_name = $par['show_name'];
            $file_path = "./data/".$show_name;

            //$real_type = $par['real_type'];

            header("Pragma: public");
            //응답의 정보를 캐시 할수 있습니다.
            //좀더 정교한 캐시컨트롤을 위해 별도의 지시자가 추가되었으므로, pragama는 사용하지 않는 것이 좋지만,
            //1.0과의 하위 호환성을 위해 남아있음.
            //인증이 된 상태더라도 캐시하도록 하는것
            //private 특정 브라우저만 캐쉬하도록 설정.
            header("Expires: 0");
            //http date 형태로 날짜를 지정하며 로컬타임이 아닌 gmt를 사용
            //규칙적인 시간간격으로 컨텐츠가 바뀔때 유용하다.
            //단순히 캐시에 응답이 오래된 것을 전하기 위해 캐시된 복사본을 사용하기 전에 응담를 재검증해야한다.
            //만료를 추가
            header("Content-Type: application/octet-stream");
            //확장자 지정, 확장자가 없을 경우에 사용
            header("Content-Disposition: attachment; filename=\"$show_name\"");
            //송신 설명 파일 - 헤더정보를 첨부파일 및 파일 이름
            header("Content-Transfer-Encoding: binary");
            //mime(다목적 인터넷 우편 확장 표준)규격 - 헤더 에서 우편물 유형, 사용된 문자세트 및 인코딩 방슥 등의 정보를 가짐
            // 전송 내용물 인코딩을 할때 binary는 인코딩을 하지 않는 방식 한라인에 1000문자를 넘지 못하도록 규정하고 있는데,
            // binary 방식에서는 길이에 제약이 없고, 인코딩을 하지 않음.
            header("Content-Length: ".filesize($file_path));
            //송신 지정한 파일 크기 정보 단위-바이트


            //버퍼 이동하고자 하는 데이터를 담고있다.
            //다른장치로 데이터를 전송할 경우에 양자간의 데이터의 전송속도나 처리속도의 차를 보상하여
            //양호하게 결합할 목적으로 사용하는 기억영역을 버퍼라한다.
            ob_clean();	//출력없이 버퍼만 지우고, 종료하지는 않습니다.
            //출력 버퍼의 모든 내용을 버립니다. 출력버퍼를 파괴하지는 않습니다.
            flush();	//php의 백엔드에 관계없이 출력 버퍼를 비웁니다.
            //사실상 모든 출력을 사용자 브라우저에 보냅니다.
            readfile($file_path);
            //파일을 출력합니다. 파일을 읽고 출력버퍼에 기록합니다.
            //반환값으로 파일에서 읽은 바이트수를 반환
            //파일의 모든 데이터를 읽어서 표준출력으로 내보낸다. 파일을 닫음
            //실질적인 다운로드
        }

        /**
         ******************상품 상세********************
         */
        public function specificAction($par){
            $dat = $this->_connect_model->get('Product')->getSpecificProduct($par['id'],$par['pShort']);

            $specific_view = $this->render(array(
                'dat'=>$dat
            ));

            return $specific_view;
        }

        /**
         ******************파일 경로********************
         */
        public function fileUpload($pName, $pFile_path, $pFile_dr)
        {
            // input 태그 name, 상대 경로, 상대 경로

            $rFile_path = "";
            // 안하면 문자열 선언 안한걸로

            $fileName = $_FILES[$pName]['name'];
            $file_path = $pFile_path . $fileName;
            $file_tmp = $_FILES[$pName]['tmp_name'];  // 내가 지정한게 아니라 프로그램에서 직접 지정한 서버상 파일명

            if (move_uploaded_file($file_tmp, $file_path)) {
                // 반환값이 true or false
                $rFile_dr = $pFile_dr;
                $rFile_name = $fileName;
                $rFile_path = $rFile_dr . $rFile_name;
            }

            return $rFile_path;
        } // 실제 파일 경로를 문자열로 반환하는 함수


        /**
        ******************상품등록********************
        */
        public function addProductAction(){
            //세션에 있는 사용자 정보를 얻어옴/
            $user = $this->_session->get('user');
            // echo ($user['user_name']);
            if ($user['user_name'] == 'root') {
                //product 테이블에서 사용자 ID로 데이터를 조회해 옴(사용자의 글목록)
                $dat = $this->_connect_model->get('Product')->getUserData($user['user_name']);

                $index_view = $this->render(array(
                    'statuses' => $dat, //글목록 정보
                    //'message' => '',  //글작성 전이라 공백처리,form 태그 내 입력창의 입력된 내용
                    '_token' => $this->getToken(self::POST),
                ));

                return $index_view;
            } else {
                echo ("
                    <script>
                        alert('관리자로 로그인 후 이용바랍니다 :)');
                        history.go(-1);
                    </script>
                ");
            }
        }

        /**
         ******************상품 insert********************
         */
        public function insertAction(){
            $user = $this->_session->get('user');

            if(!$this->_request->isPost()){
                $this->httpNotFound(); //FileNotFoundException 예외객체를 생성
            }

            $now = new DateTime();

            $s_fileUpload = $this->fileUpload("upFile", "./data/", "./data/");

            $pShort = $this->_request->getPost('pShort');
            $pLong = $this->_request->getPost('pLong');
            $pType = $this->_request->getPost('pType');
            $pPrice = $this->_request->getPost('pPrice');
            $pInfo = $this->_request->getPost('pInfo');
            $pCount = $this->_request->getPost('pCount');

            $productV = array(
                'user_id'                   => $user['user_name'],
                'time_stamp'                => $now->format('Y-m-d H:i:s'),
                'pShort'                    => $pShort,
                'pLong'                     => $pLong,
                'pType'                     => $pType,
                'pPrice'                    => $pPrice,
                'pInfo'                     => $pInfo,
                'pCount'                    => $pCount,
                'upfile_name'               => $s_fileUpload
            );
            // var_dump($productV);
            $this->_connect_model->get('Product')->addProduct($productV);

            echo ("
                <script>
                    alert('상품 구매를 완료했습니다.');
                    history.go(-1);
                </script>
            ");
        }





//        public function postAction(){ //views/product/addProduct.php내의 form태그의 action속성
//            if(!$this->_request->isPost()){
//                $this->httpNotFound();
//            }
//            $token = $this->_request->getPost('_token');
//            if(!$this->checkToken(self::POST,$token)){
//                return $this->redirect('/');
//            }
//            // $message = $this->_request->getPost('message');
//
//            $errors = array();
//
//            //http://php.net/manual/kr/function.mb-strlen.php mb: multi-bytes
////            if(!strlen($message)){
////                $errors[]='글을 작성해주세요';
////            }else if(mb_strlen($message)>200){
////                $errors[]='작성글은 최대 200문자 까지 입니다.';
////            }
//
//            if(count($errors) === 0){ //에러가 없는경우
//                $user = $this->_session->get('user'); //Session에서 사용자 데이터 획득
//                $this->_connect_model->get('Status')->insert($user['id'],$message);
//                //StatusModel 의 insert()호출하여 작성글데이터를 DB에 저장
//
//                return $this->redirect('/');
//
//            }
//
//            //에러가 있는경우
//            $user = $this ->_session->get('user');
//            $dat = $this->_connect_model->get('Status')->getUserData($user['id']);//사용자의 글 목록 가져옴
//
//            $result = $this ->render(array(
//                'errors' => $errors,
//                // 'message' => $message,
//                'statuses' => $dat,
//                '_token' => $this->getToken(self::POST),
//            ),'index');
//            return $result;
//
//        }
    }

?>