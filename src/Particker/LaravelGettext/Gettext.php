<?php
namespace Particker\LaravelGettext;

class Gettext
{
    private $_lang;
    //defualt domain
    private $_domain;
    //i18n dir
    private $_dir;
    private $_charset='UTF-8';
    /**
     * i18n support
     * @param string $dir
     * @param string $lang
     */
    public function __construct($dir,$domain,$lang,$charset='utf-8'){    
        $this->_lang = $lang;
        $this->_charset = $charset;
        setlocale(LC_ALL, $lang.".{$this->_charset}");
        $this->_dir=$dir;
        $this->set_domain($domain);
    }
    /**
     * set i18n domain
     * @param string $domain
     */
    public function set_domain($domain){
        bindtextdomain($domain, $this->_dir);
        bind_textdomain_codeset($domain , $this->_charset );
        textdomain($domain);
        $this->_domain=$domain;
        return $this;
    }
    /**
     * get i18n domain
     * @return string
     */
    public function get_domain(){
        return $this->_domain;
    }
    /**
     * get message
     * @param string $string
     * @param array $values
     * @param string $domain
     * @return string
     */
    public function __($string,array $values=NULL){
        $string=dgettext($this->_domain,$string);
        if(is_array($values)){
            foreach ($values as $k=>$v){
                $values[":".$k]=(string)$v;
                unset($values[$k]);
            }
            $string=strtr($string, $values);
        }
        return $string;
    }
}