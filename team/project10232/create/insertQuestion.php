<?php

    include "../connect/connect.php";

    $sql = "INSERT INTO `question` (`myMemberID`, `q_subject`, `q_ask`, `q_desc`, `q_choice1`, `q_choice2`, `q_choice3`, `q_choice4`, `q_answer`, `q_comment`) VALUES
    ( 2, 5, '다음 중 TCP 윈도 크기와 데이터 처리율을 감소시킨 상태에서 (Zero Window Packet) 다수 HTTP 패킷을 지속적으로 전송하여 대상 웹 서버의 연결상태가 장시간 지속, 연결자원을 소진시키는 서비스 거부 공격은 무엇인가?', '', 'Slow HTTP Read DoS', 'Slow HTTP Header DoS', 'Slow HTTP POST DoS', 'Hulk DoS', '1', '* DoS 공격 : 자원부족하게 함\r\n- SYN Flooding : 3-way-handshake, 서버 대기, SYN 패킷만 보냄\r\n- UDP Flooding : 대량의 UDP패킷, 임의 포트번호\r\n- SMURPING : IP, ICMP 데이터 집중, Echo\r\n- Ping of Death : ping명령, 큰사이즈 패킷, 프로토콜 공격\r\n- Land : IP주소 집중, 자기자신 무한 응답\r\n- TearDrop : Fragment Offset, 패킷 재조립, 과부하\r\n- Bonk : 같은 시퀀스번호 계속보냄\r\n- Boink : 시퀀스번호 빈공간 생성\r\n\r\n* DDos 공격 : 분산 지점에서 한곳의 서버 공격, 네트워크 취약점 호스트, 분산 서비스 공격\r\n- Trinoo : UDP flood 유발\r\n- TFN(Tribe Flood Network) : Trinoo와 비슷\r\n- Stacheldraht : 분산 서비스거부 에이전트 역할\r\n\r\n* 애플리케이션공격 :\r\n- HTTP GET Flooding : 캐시옵션 조작, 웹서버 자원소진,\r\n- Slowloris(Slow HTTP Header Dos) : 헤더 끝 개행문자열 전송 x 연경자원 소진,\r\n- RUDY(Slow HTTP POST Dos) : 메시지 바디부분 소량으로 보냄\r\n- Slow HTTP Read Dos : TCP 윈도크기, 처리율 감소\r\n- Hulk Dos : URL 지속 변경 다량으로 GET 요청\r\n- Hash Dos : 해시충돌발생\r\n\r\n* 네트워크 침해 공격 :\r\n- Sniffing : 직접공격 x 데이터 몰래 들여다봄\r\n- 트로이목마 : 겉보기에는 정상 실행하면 악성코드\r\n\r\n+ 보안관련 용어\r\n- 스미싱 : 문자메시지, 개인신용정보\r\n- 스피어피싱 : 이메일, 개인정보 탈취\r\n- APT : 특정기업이나 조직 네트워크\r\n- 랜섬웨어 : 몸값요구\r\n- 공급망(Supply Chain Attack) : 개발사의 네트워크 침투'),
    ( 2, 4, '다음 중 IP 호스트가 자신의 물리 네트워크 주소(MAC)는 알지만 IP 주소를 모르는 경우, 서버로부터 IP 주소를 요청하기 위해 사용하는 프로토콜은 무엇인가?', '', 'Internet Protocol', 'Address Resolution Protocol', 'Internet Control Message Protocol', 'Reverse Address Resolution Protocol', '4', '*ARP : IP주소를 MAC주소로 변환(논리주소 -> 물리주소)\r\n*RARP : MAC주소를 IP주소로 변환(물리주소 -> 논리주소)\r\n\r\nARP: IP to MAC (L to P)\r\nR(Reverse)ARP : MAC to IP (P to L)'),
    ( 2, 3, '다음 중 제2정규형(2NF)에서 제3정규형(3NF)가 되기 위한 조건은? ', '', '결정자가 후보키가 아닌 함수 종속 제거', '이행적 함수 종속 제거', '부분적 함수 종속 제거', '원자값이 아닌 도메인 분해', '2', '정규형(원부이결다조)'),
    ( 2, 1, '다음 중 스크럼 기법에서 사용하는 차트로 남아있는 백로그 대비 시간을 그래픽적으로 표현한 차트는?', '', 'Sprint Backlog', 'Kanban Board', 'Burn Down Chart', 'LEAN', '3', '스크럼 요소\r\n백로그(Backlog): 요구사항\r\n스프린트(sprint): 2-4주의 짧은 개발 기간의 반복적 수행으로 개발 품질 향상\r\n스프린트 회고(spring retrospective): 해당 스프린트가 끝난 시점이나 일정 주기로 스프린트 주기 되돌아보며 정해놓은 규칙 준수 여부 , 개선점 등 확인 및 기록\r\n스크림 미팅: 5분 정도의 계획 미팅\r\n스크림 마스터: 팀 리더\r\n번 다운 차트: 그래픽적 표현\r\n\r\nLean(린): 칸반보드'),
    ( 2, 2, '다음 중 암호화된 콘텐츠, 콘텐츠 관련 메타 데이터, 클리어링 하우스에서 부여받은 콘텐츠 사용정보를 암호화한 콘텐츠로 변환하는 도구는 무엇인가?', '', 'DRM 컨트롤러', '패키저(Packager)', '보안 컨테이너', 'DOI', '2', '패키저 : 암호화한 콘텐츠로 변환\r\nDRM 컨트롤러 : 디지털 콘텐츠 이용 권한 통제\r\n보안 컨테이너 : 안전 유통을 위한 전자적 보안 장치'),
    ( 2, 2, '다음 중 UI 시나리오 문서의 작성 요건 중 올바르지 않은 것은?', '', 'UI 시나리오는 누락이 없어야 하고, 최대한 빠짐없이 가능한 한 상세하게 기술해야 한다. ', 'UI 시나리오는 한 환경에서 다른 환경으로 쉽게 전이될 수 있도록 기술해야 한다.', 'UI 시나리오는 쉽게 추적이 가능해야 하고, 변경 사항들이 언제, 어디서, 어떤 부분들이, 왜 발생하였는지 추적이 쉬워야 한다. ', 'UI 시나리오는 처음 접하는 사람도 이해하기 쉽도록 구성하고 설명해야 하고, 이해하지 못하는 추상적인 표현이나 이해하기 어려운 용어는 사용하지 않아야 한다.', '2', 'UI 시나리오 문서의 작성요건\r\n완일이가추수 : 완전성, 일관성, 이해성/가독성/추적용이성, 수정용이성'),
    ( 2, 3, '트랜잭션의 특성 중 다음 설명에 해당하는 것은?', '트랜잭션의 연산은 데이터베이스에 모두 반영되든지 아니면 전혀 반영되지 않아야한다.', 'Durability', 'Share', 'Consistency', 'Atomicity', '4', '트랜잭션의 특성\r\n\r\n\r\n원자성(Atomicity)\r\n트랜잭션에 포함된 명령들은 모두 수행되거나, 모두 수행 안되어야 한다. 즉 어느 명령은 실행되고 어느 명령은 실행되지 않으면 안된다.\r\n\r\n일관성(Consistancy)\r\n트랜잭션이 완료된 뒤에는 일관적인 상태에 있어야 한다. 트랜잭션의 영향이 한 방향으로만 전달되어야 한다.\r\n\r\n고립성(Isolation)\r\n트랜잭션은 다른 트랜잭션과 독립적으로 실행되는 것 처럼 보여야 한다. 트랜잭션의 부분상태를 다른 트랜잭션에 제공해서는 안된다.\r\n\r\n지속성(Durability)\r\n트랜잭션의 결과는 반드시 데이터베이스에 반영되어야 한다.\r\n')";

    $result = $connect -> query($sql);

    if($result){
        echo "성공";
    } else {
        echo "실패";
        exit;
    }

?>