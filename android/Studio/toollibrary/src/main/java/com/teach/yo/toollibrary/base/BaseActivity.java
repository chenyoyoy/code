package com.teach.yo.toollibrary.base;

import android.app.Activity;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.util.Log;

import java.util.Set;

/**
 * Created by chenyoyo
 * on 2018/3/18.
 */

public class BaseActivity extends Activity{
    protected String TAG = "" ;
    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        TAG = getClass().getSimpleName() ;
        printBundle(savedInstanceState,"onCreate") ;
        printLifeCycle("onCreate");
    }
    @Override
    protected void onRestoreInstanceState(Bundle savedInstanceState) {
        super.onRestoreInstanceState(savedInstanceState);
        printLifeCycle("onRestoreInstanceState");
        printBundle(savedInstanceState,"onRestoreInstanceState") ;
    }
    @Override
    protected void onSaveInstanceState(Bundle outState) {
        super.onSaveInstanceState(outState);
        printLifeCycle("onSaveInstanceState");
        printBundle(outState,"onSaveInstanceState") ;
    }
    @Override
    protected void onStart() {
        super.onStart();
        printLifeCycle("onStart");
    }
    @Override
    protected void onRestart() {
        super.onRestart();
        printLifeCycle("onRestart");
    }
    @Override
    protected void onResume() {
        super.onResume();
        printLifeCycle("onResume");
    }
    @Override
    protected void onPause() {
        super.onPause();
        printLifeCycle("onPause");
    }
    @Override
    protected void onStop() {
        super.onStop();
        printLifeCycle("onStop");
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
        printLifeCycle("printLifeCycle");
    }
    private void printLifeCycle(String name){
        Log.d(TAG,"printLifeCycle:"+name+"\n");
    }

    private void printBundle(Bundle bundle,String methodName){
        if(bundle!=null){
            Set<String> set= bundle.keySet() ;
               for(String key :set){
                   Log.d(TAG,"Method:"+methodName+"--key:"+key+"--value:"+bundle.get(key)+"\n");
               }
        }else {
            Log.d(TAG,"Method:"+methodName+"bundle == null");
        }
    }
}
