<?php
/**
 * ���ֻ��tae��߿��ŵĻ��������һ���б����Ŀǰֻ���ǿ����߱�д�����ʱ����һ��ָ����
 * ���������ߵ�Ч�ʣ������ٴ�����ֱ��include��
 * �����SDK�����ߣ��򻹿��Ե���SDK�г����ŵĽӿ�
 * �����TOP�����ߣ��򻹿��� �����Լ������top�ӿ�
 */

/**
 * FileStore
 */
class FileStoreService
{


    /**
     * �ж��ļ��Ƿ����
     * @param string  $file_path   �ļ�·��
     * @return true ����, false ������
     */
    function isFileExist($file_path){
        return true;
    }

    /**
     * �����ļ���
     * @param string $dir_path   �ļ���·��
     * @return int 0����ɹ�������ʧ��
     */
    function createDir($dir_path)
    {
        return 0;
    }

    /**
     * ��ȡ�ı��ļ�������
     * @param string $file_path �ļ�·��
     * @return string file text     �ļ�����
     */
    function getFileText($file_path)
    {
        return "";
    }

    /**
     * �����ı��ļ�������
     * @param string $content  �ļ�����
     * @param  string $file_path      �ļ�·��
     * @return true �ɹ���false ʧ��
     */
    function saveTextFile($content, $file_path)
    {
        return true;
    }

    /**
     * ����������ļ�����
     * @param array$content  �ļ������ֽ�����
     * @param string $file_path    �ļ�·��
     * @return true �ɹ���false ʧ��
     */
    function saveBinaryFile($content, $file_path)
    {
        return true;
    }

    /**
     * ��ȡ�������ļ�������
     * @param $file_path    �ļ�·��
     * @return array            �ֽ�����
     */
    function getBinaryFile($file_path)
    {
        return array();
    }

    /**
     * ɾ���ļ�
     * @param $file_path  �ļ�·��
     * @return int 0����ɹ�������ʧ��
     */
    function deleteFile($file_path)
    {
        return 0;
    }


}

/**
 * �Ա��ֲ�ʽCache
 */
class CacheService
{
    /**
     * ��cache�л�ȡkey��Ӧ��ֵ
     * @param $key ����key
     * @return string  ����ֵ
     */
    function get($key)
    {
        return "";
    }
	
	/**
     * ��cache�л�ȡ���key��Ӧ��ֵ����
     * @param $keys ���Keyֵ
     * @return string  ����ֵ
     */
    function mget($keys)
    {
        return array();
    }

    /**
     * �ӻ�����ɾ��eky
     * @param string $key  ����key
     * @return true �ɹ���false ʧ��
     */
    function delete($key)
    {
             return true;
    }

    /**
     * �򻺴������ֵ
     * @param string $key ����key
     * @param string $text  ����ֵ
     * @param int $expired   ����ʱ�䣬��λΪ��
     * @return true �ɹ���false ʧ��
     */
    function set($key, $text, $expired)
    {
            return true;
    }
}

/**
 * http fetch
 */
class FetchService{
         /**
     * ����get���󣬲���ȡ��������
     * @param string $url �����url
     * @return string ���������
     */
    function fetchByGet($url){

             return "" ;
    }

      /**
     * ����post���󣬲���ȡ��������
     * @param string $url �����url
       * @param array $parameters ����Ĳ���
     * @return string ���������
     */
    function post($url, $parameters){
            return "" ;

    }


}


/**
 * taobao distributed cache
 */
$cacheService = new CacheService();

/**
 * FileStore service
 */
$fileStoreService = new FileStoreService();

/**
 *  fetchurl  service
 */
$fetchService = new  FetchService();



/**
 *  cron  service
 *  �����ߺ�̨����console����  ,�ݲ��ṩ����ӿ�
 */

/**
 *  mysql  service
 *  ԭ��pdo��ʽ���ʷ�ʽ����΢��Щ�Ķ������������ָ��
 */

class User{

    public  $userId;
    public  $nick;

}
/**
 * ����������
 */
class Context{
    /**
     * ��ȡ��ǰ��¼�û���Ϣ
     * @return User
     */
    function getBrowser(){
          return new User();

    }

    /**
     * ��ȡ��ǰ���ƹ���Ϣ
     * @return User
     */
    function getSiteOwner(){
                 return new User();
    }


}
/**
 * ȫ�ֱ���
 */
$_cdnServer="http://www.tbcdn.com";
$_taeServer ="http://www.tbcdn.com";
$appLog;   //��־���񣬸�log4j�Ľӿ����ƣ� ����ʹ��$appLog->info("infolog") ; $appLog->warn("warnlog")
//����ҳ�����
$_page->setTitle("ҳ���������");
$context = new Context();   //����������ģ�
?>