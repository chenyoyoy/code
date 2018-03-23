package com.teach.yo.codeshop;

import android.os.Bundle;
import android.view.View;

import com.teach.yo.toollibrary.base.BaseActivity;

public class SystemExitActivity extends BaseActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_system_exit);

        findViewById(R.id.btn_resume_activity_kill).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                System.exit(0);
            }
        });
    }
}
