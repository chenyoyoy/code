package com.teach.yo.codeshop;

import android.content.Intent;
import android.nfc.Tag;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.text.Editable;
import android.text.TextWatcher;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;

import com.teach.yo.codeshop.bean.CommonBean;
import com.teach.yo.toollibrary.base.BaseActivity;

/**
 * Created by chenyoyo
 * on 2018/3/18.
 */

public class StateResumeActivity extends BaseActivity {
    private EditText editText;
    private static String DATA_SAVE_KEY = "data_save_key";
    private CommonBean bean ;
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.test_activity_resume_layout);
        editText = (EditText) findViewById(R.id.edt_resume_act);
        editText.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence s, int start, int count, int after) {
            }
            @Override
            public void onTextChanged(CharSequence s, int start, int before, int count) {
            }
            @Override
            public void afterTextChanged(Editable s) {
                ((TextView)findViewById(R.id.tv_resume_act)).setText(s.toString());
            }
        });
        if (savedInstanceState != null) {
            bean = (CommonBean) savedInstanceState.getSerializable(DATA_SAVE_KEY);
            if(bean!=null){
                Log.d(TAG,String.format("bean 对象 name des type is %s %s %s",bean.name,bean.description,bean.type));
            }
        }
        findViewById(R.id.btn_next_activity).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent =new Intent(StateResumeActivity.this,SystemExitActivity.class) ;
                startActivity(intent);
            }
        });
    }
    protected void onSaveInstanceState(Bundle outState) {
        super.onSaveInstanceState(outState);
        bean = new CommonBean() ;
        bean.name =editText.getText().toString();
        bean.description ="描述" ;
        bean.type=1;
        outState.putSerializable(DATA_SAVE_KEY, bean);
    }
}
