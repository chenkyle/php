


function set_school_class1(c1) {
    o = document.form1.sch_class2;
    while(o.length>1) { o[1] = null; }
    c2_arr = school_classes[c1];
    oi = 1;
    for(i=0;i<c2_arr.length;i++) {
        o[oi++] = new Option(c2_arr[i][1],c2_arr[i][0],false,false);
    }
}

function set_school_city(cap,def_city) {
    o = document.form1.sch_city
    while(o.length>1) { o[1] = null }
    oi = 1
    for(i=0;i<cn_regions.length;i++) {
        x = cn_regions[i]
        if( x[1]=="city" && x[2]==cap ) {
            o[oi++] = new Option(x[3],x[3],false,def_city==x[3])
        }
    }
}

function set_school_capital(p,def_cap,def_city) {
    o = document.form1.sch_capital
    while(o.length>1) { o[1] = null }
    oi = 1
    for(i=0;i<cn_regions.length;i++) {
        x = cn_regions[i]
        if( x[1]=="capital" && x[2]==p) {
            o[oi++] = new Option(x[3],x[3],false,def_cap==x[3])
	    if(def_cap==x[3]) { def_cap = x[0]; }
        }
    }
    set_school_city(def_cap,def_city)
}

function set_school_pos(def_p,def_cap,def_city) {

    p = document.form1.sch_province
    while(p.length>1) { p[1] = null }
    pi = 1
    s = ""
    for(i=0;i<cn_regions.length;i++) {
        x = cn_regions[i]
        if( x[1] == "province" ) {
            p[pi++] = new Option(x[3],x[3],false,def_p==x[3])
	    if(def_p==x[3]) { def_p = x[0]; }
        }
    }
    set_school_capital(def_p,def_cap,def_city)
}

